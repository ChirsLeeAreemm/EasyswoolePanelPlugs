<?php
/**
 * 插件认证逻辑
 * User: Siam
 * Date: 2020/12/1 0001
 * Time: 21:20
 */

namespace Siam\Plugs\service;


class PlugsAuthService
{
    const configName = "esPlugsConfig.php";
    public static function plugsPath($vendorName)
    {
        return EASYSWOOLE_ROOT."/vendor/".$vendorName."/";
    }

    /**
     * 是否为插件
     * @param $vendorName
     * @return bool
     */
    public static function isPlugs($vendorName)
    {
        $vendorPath = static::plugsPath($vendorName);
        if (is_file($vendorPath.static::configName)){
            return true;
        }
        return false;
    }

    /**
     * 获取插件配置
     * @param $vendorName
     * @return mixed|null
     */
    public static function getPlugsConfig($vendorName)
    {
        $vendorPath = static::plugsPath($vendorName);

        if (is_file($vendorPath.static::configName)){
            $fullPath =  $vendorPath.static::configName;
            return require $fullPath;
        }
        return null;
    }
}