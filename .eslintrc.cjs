// eslint-disable-next-line no-undef
module.exports = {
    root: true,
    extends: ['@teamrad/eslint-config'],
    env: {
        'cypress/globals': true,
    },
    rules: {
        'prettier/prettier': ['error', {}, {usePrettierrc: true}],
        '@typescript-eslint/adjacent-overload-signatures': 'warn',
        '@typescript-eslint/no-var-requires': 'warn',
        '@typescript-eslint/no-explicit-any': 'warn',
        '@typescript-eslint/no-unused-vars': 'warn',
        'cypress/no-assigning-return-values': 'warn',
        'cypress/no-unnecessary-waiting': 'warn',
        'cypress/assertion-before-screenshot': 'warn',
        'cypress/no-force': 'warn',
        'cypress/no-async-tests': 'warn',
        'cypress/no-pause': 'warn',
        'cypress/unsafe-to-chain-command': 'warn',
        // 'quotes': 'single',
    },
    overrides: [
        {
            files: ['cypress/support/all-commands/*'],
            rules: {
                '@typescript-eslint/no-namespace': 'off',
            },
        },
        {
            files: ['bin/*'],
            rules: {
                'no-undef': 'off',
                '@typescript-eslint/no-var-requires': 'off',
            },
        },
    ],
};
