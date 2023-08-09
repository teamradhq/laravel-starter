"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var swap_env_1 = require("./swap-env");
var pluginConfig = function (on, config) {
    on('task', swap_env_1.default);
};
exports.default = pluginConfig;
