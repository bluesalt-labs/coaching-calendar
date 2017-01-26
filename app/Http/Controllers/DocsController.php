<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DocsController extends Controller
{

    const BASE_URL = '/api/v1/docs/';

    public function index() {
        return view('docs.index', Array(
            'navLinks' => self::getRoutes('Home'),
            'breadcrumbs' => self::getBreadcrumbs(),
            )
        );
    }

    /**
     * Searches the API docs
     * TODO
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function searchIndex(Request $request) {
        $searchQuery = $request->input('q');

       return view('docs.search', Array(
               'searchQuery' => $searchQuery,
               'navLinks' => self::getRoutes('Search'),
               'breadcrumbs' => self::getBreadcrumbs('Search'),
            )
        );
    }

    public function adminIndex() {
        return view('docs.admin.index', Array(
            'navLinks' => self::getRoutes('Admin'),
            'breadcrumbs' => self::getBreadcrumbs('Admin'),
            )
        );
    }

    public function appointmentIndex() {
        return view('docs.appointment.index', Array(
            'navLinks' => self::getRoutes('Appointment'),
            'breadcrumbs' => self::getBreadcrumbs('Appointment'),
            )
        );
    }

    public function calendarIndex() {
        return view('docs.calendar.index', Array(
            'navLinks' => self::getRoutes('Calendar'),
            'breadcrumbs' => self::getBreadcrumbs('Calendar'),
            )
        );
    }

    public function configIndex() {
        return view('docs.config.index', Array(
            'navLinks' => self::getRoutes('Config'),
            'breadcrumbs' => self::getBreadcrumbs('Config'),
            )
        );
    }

    public function memberIndex() {
        return view('docs.member.index', Array(
            'navLinks' => self::getRoutes('Member'),
            'breadcrumbs' => self::getBreadcrumbs('Member'),
            )
        );
    }

    public function userIndex() {
        return view('docs.user.index', Array(
            'navLinks' => self::getRoutes('User'),
            'breadcrumbs' => self::getBreadcrumbs('User'),
            )
        );
    }

    public static function getRouteUrl($routeName) {
        switch($routeName) {
            case 'Home':        return self::BASE_URL; break;
            case 'Search':        return self::BASE_URL.'search/'; break;
            case 'Admin':       return self::BASE_URL.'admin/'; break;
            case 'Appointment': return self::BASE_URL.'appointment/'; break;
            case 'Calendar':    return self::BASE_URL.'calendar/'; break;
            case 'Config':      return self::BASE_URL.'config/'; break;
            case 'Member':      return self::BASE_URL.'member/'; break;
            case 'User':        return self::BASE_URL.'user/'; break;
            default:            return self::BASE_URL;
        }
    }

    /**
     * Sorry, I can't figure out a better way to do this.
     * If the `/api/v1/docs/` part of the url changes, this won't be updated
     * @param $activeName
     * @return array of route urls
     */
    public static function getRoutes($activeName) {
        return Array(
            'Home'          => Array(
                'active'        => ('Home' === $activeName),
                'url'           => self::getRouteUrl('Home'),
                'nested'        => false,
            ),
            'Admin'         => Array(
                'active'        => ('Admin' === $activeName),
                'url'           => self::getRouteUrl('Admin'),
                'nested'        => false,
            ),
            'Appointment'   => Array(
                'active'        => ('Appointment' === $activeName),
                'url'           => self::getRouteUrl('Appointment'),
                'nested'        => false,
            ),
            'Calendar'      => Array(
                'active'        => ('Calendar' === $activeName),
                'url'           => self::getRouteUrl('Calendar'),
                'nested'        => false,
            ),
            'Config'        => Array(
                'active'        => ('Config' === $activeName),
                'url'           => self::getRouteUrl('Config'),
                'nested'        => false,
            ),
            'Member'        => Array(
                'active'        => ('Member' === $activeName),
                'url'           => self::getRouteUrl('Member'),
                'nested'        => false,
            ),
            'User'          => Array(
                'active'        => ('User' === $activeName),
                'url'           => self::getRouteUrl('User'),
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
            'Home'  => Array(
                'url'       => self::getRouteUrl('Home'),
                'active'    => true,
            ),
        );

        if($basePage != '') {
            $breadcrumbs['Home']['active'] = false;

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

