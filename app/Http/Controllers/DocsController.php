<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\App;

class DocsController extends Controller
{
    public function index() {
        return view('docs.index', ['navLinks' => $this->getRoutes('Home')]);
    }
    public function adminIndex() {
        return view('docs.admin.index', ['navLinks' => $this->getRoutes('Admin')]);
    }

    public function appointmentIndex() {
        return view('docs.appointment.index', ['navLinks' => $this->getRoutes('Appointment')]);
    }

    public function calendarIndex() {
        return view('docs.calendar.index', ['navLinks' => $this->getRoutes('Calendar')]);
    }

    public function configIndex() {
        return view('docs.config.index', ['navLinks' => $this->getRoutes('Config')]);
    }

    public function memberIndex() {
        return view('docs.member.index', ['navLinks' => $this->getRoutes('Member')]);
    }

    public function userIndex() {
        return view('docs.user.index', ['navLinks' => $this->getRoutes('User')]);
    }

    /**
     * Sorry, I can't figure out a better way to do this.
     * If the `/api/v1/docs/` part of the url changes, this won't be updated
     * @return array of route urls
     */
    public static function getRoutes($activeName) {
        $baseUrl = '/api/v1/docs/';
        return Array(
            'Home'          => Array(
                'active'        => ('Home' === $activeName),
                'url'           => $baseUrl,
                ),
            'Admin'         => Array(
                'active'        => ('Admin' === $activeName),
                'url'           => $baseUrl . 'admin',
            ),
            'Appointment'   => Array(
                'active'        => ('Appointment' === $activeName),
                'url'           => $baseUrl . 'appointment',
            ),
            'Calendar'      => Array(
                'active'        => ('Calendar' === $activeName),
                'url'           => $baseUrl . 'calendar',
            ),
            'Config'        => Array(
                'active'        => ('Config' === $activeName),
                'url'           => $baseUrl . 'config',
            ),
            'Member'        => Array(
                'active'        => ('Member' === $activeName),
                'url'           => $baseUrl . 'member',
            ),
            'User'          => Array(
                'active'        => ('User' === $activeName),
                'url'           => $baseUrl . 'user',
            ),
        );
    }
}

