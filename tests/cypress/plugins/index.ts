import swapEnv from './swap-env';

// eslint-disable-next-line @typescript-eslint/no-unused-vars
export const plugins: Cypress.PluginConfig = (on, config) => {
  on('task', swapEnv);
};

export default plugins;
