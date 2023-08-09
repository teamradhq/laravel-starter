import swapEnv from "./swap-env";

const pluginConfig: Cypress.PluginConfig = (on, config) => {
    on('task', swapEnv);
}

export default pluginConfig;
