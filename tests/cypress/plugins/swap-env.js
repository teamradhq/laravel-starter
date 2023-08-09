"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var fs = require("fs");
exports.default = {
    activateCypressEnvFile: function () {
        if (fs.existsSync('.env.cypress')) {
            fs.renameSync('.env', '.env.backup');
            fs.renameSync('.env.cypress', '.env');
        }
        return null;
    },
    activateLocalEnvFile: function () {
        if (fs.existsSync('.env.backup')) {
            fs.renameSync('.env', '.env.cypress');
            fs.renameSync('.env.backup', '.env');
        }
        return null;
    }
};
