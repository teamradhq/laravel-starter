import swapEnv from "./swap-env";

export const plugins: Cypress.PluginConfig = (on, config) => {
    on('task', swapEnv);
}

export default plugins;
