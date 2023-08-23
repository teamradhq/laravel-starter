#!/usr/bin/env node
const fs = require('fs');
const path = require('path');
const semver = require('semver');
const args = require('minimist')(process.argv.slice(2));
const { exec, execSync } = require('child_process');
const rootDir = path.join(__dirname, '..');

function execute(command, isSilent = false) {
  execSync(command, { stdio: isSilent ? 'ignore' : 'inherit' });
}

/**
 * Display the usage for this command.
 */
function usage() {
  console.log(
    'Sets the application version in package.json and composer.json.\n'
  );
  console.log(
    'Usage:\n\tapp-version --version x.y.z [--force] [--set-tag] [--message "Tag Message"]\n'
  );
  const options = {
    version: [
      'New Version',
      'The application version to set. This should be a valid semantic version.',
    ],
    force: [
      'Force Update',
      "Force update to the new version, even if it's lower than the current one.",
    ],
    'set-tag': [
      'Set Tag',
      'Commit the changes and tag the commit with the new version abd push to the remote repository.',
    ],
    message: [
      'Tag Message',
      'Provide an optional message for the tag. Defaults to "Release x.y.z."',
    ],
  };

  console.log('\nOptions:');
  for (const [arg, [name, description]] of Object.entries(options)) {
    console.log(`  --${arg}\t ${name}\t${description}`);
  }
}

/**
 * Get the content of composer and package json files.
 * @returns {Record<'composer.json'|'package.json', { version: string }>}
 */
function getDataFiles() {
  return {
    'package.json': require('../package.json'),
    'composer.json': require('../composer.json'),
  };
}

/**
 * Extract the current version from package or composer json. Defaults to
 * 0.0.0 if a current version is not set.
 *
 * @param files
 * @returns {string|string}
 */
function getCurrentVersion(files = null) {
  return (
    files['package.json'].version || files['composer.json'].version || '0.0.0'
  );
}

/**
 * Exit if the new version is not a valid semver, or when it's lower than
 * the current version, and we're not forcing the update.
 *
 * @param version
 * @param currentVersion
 */
function validateVersion(version, currentVersion) {
  if (!semver.valid(version)) {
    console.error(`Version "${version}" is not valid semver version.`);
    process.exit(1);
  }

  if (args.force) {
    return;
  }

  if (semver.lte(version, currentVersion)) {
    console.error(
      `Version "${version}" is not greater than current version "${currentVersion}".`
    );
    process.exit(2);
  }
}

function publishVersion() {
  const message = args.message || `Release ${args.version}.`;

  process.chdir(rootDir);
  execute(`git add composer.json package.json composer.lock`);
  execute(`git commit -m "Update app version to ${args.version}."`);
  execute(`git tag -a ${args.version} -m "${message}"`);
  execute('git push');
  execute('git push --tags');

  console.log('Published new version to remote repository.');
}

/**
 * Set App Version
 *
 * Validate the provided version and update composer and package json
 * files. We also update composer's lock file with the new version.
 */
function main() {
  if (!args.version) {
    console.error('Missing version argument.');
    usage();
    process.exit(0);
  }

  const files = getDataFiles();
  const currentVersion = getCurrentVersion(files);

  validateVersion(args.version, currentVersion);

  for (const [filename, data] of Object.entries(files)) {
    const filepath = path.join(__dirname, `../${filename}`);
    data.version = args.version;

    fs.writeFileSync(filepath, JSON.stringify(data, null, 4));
  }

  exec('composer update --lock');

  console.log(`Updated app version to ${args.version}.`);

  if (!args['set-tag']) {
    process.exit(0);
  }

  publishVersion();
}

if (require.main === module) {
  main();
}
