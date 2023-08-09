import swapEnv from "./swap-env";
export var plugins = function (on, config) {
    on('task', swapEnv);
};
export default plugins;
