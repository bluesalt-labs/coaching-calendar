<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    const BASE_URL = '/admin/';
    // The following is for testing only. I don't want to deal with authentication right now.


    /**
     * If admin is logged in, return admin dashboard
     */
    public function index() {
        return view('admin.index', Array(
                'navLinks' => self::getRoutes('Home'),
                'breadcrumbs' => self::getBreadcrumbs(),
            )
        );
    }


    public function login(Request $request) {
        // todo
    }

    public function settings(Request $request) {
        return view('admin.settings', Array(
                'navLinks' => self::getRoutes(),
                'breadcrumbs' => self::getBreadcrumbs(),
            )
        );
    }


    public static function getRouteUrl($routeName) {
        switch($routeName) {
            case 'Dashboard':   return self::BASE_URL; break;
            case 'Settings':    return self::BASE_URL.'settings/'; break;
            default:            return self::BASE_URL;
        }
    }

    /**
     * Sorry, I can't figure out a better way to do this.
     * @param $activeName
     * @return array of route urls
     */
    public static function getRoutes($activeName) {
        return Array(
            'Dashboard'          => Array(
                'active'        => ('Dashboard' === $activeName),
                'url'           => self::getRouteUrl('Dashboard'),
                'nested'        => false,
            ),
            'Settings'         => Array(
                'active'        => ('Settings' === $activeName),
                'url'           => self::getRouteUrl('Settings'),
                'nested'        => false,
            ),
        );
    }

    /**
     * Again, sorry, I can't figure out a better way to do this.
     * @param string $basePage
     * @param array $subPages
     * @return array
     */
    public static function getBreadcrumbs($basePage = '', $subPages = Array()) {
        $breadcrumbs = Array(
            'Dashboard'  => Array(
                'url'       => self::getRouteUrl('Dashboard'),
                'active'    => true,
            ),
        );

        if($basePage != '') {
            $breadcrumbs['Dashboard']['active'] = false;

            $breadcrumbs[$basePage] = Array(
                'url'       => self::getRouteUrl($basePage),
                'active'    => true,
            );

            $len = count($subPages);
            if($len > 0) {
                $breadcrumbs[$basePage]['active'] = false;
                $i = 0;
                foreach($subPages as $subPage) {
                    $breadcrumbs[$subPage] = Array(
                        'url'       => self::getRouteUrl($basePage.'.'.$subPage),
                        'active'    => ($i == $len - 1),
                    );
                    $i++;
                }
            }
        }

        return $breadcrumbs;
    }
}

