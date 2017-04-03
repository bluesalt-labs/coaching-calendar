@extends('layouts.test')

@section('title', 'Home')

@section('content')
    @parent

    <h1>API Tests Page</h1>
    <span><a href="/api/v1/docs/">Back to Documentation</a></span>
    <hr />

    <!-- Admin Controller -->
    <h1 class="sidebar-link" id="admin">Admin</h1>
    <br />
    <code>todo</code>

    <!-- End Admin Controller -->
    <hr />

    <!-- Appointment Controller -->
    <h1 class="sidebar-link" id="appointment">Appointment</h1>

    <!-- Appointment->getAll -->
    <h2 class="sidebar-link" id="appointment-getAll"><code><a href="/api/v1/docs/appointment#getAll" target="_blank" class="docs-link">getAll</a></code></h2>
    <span>Request Type: <code>GET</code></span>

    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
apiGet('appointment', 'all', [], function(data){
    document.getElementById('appointment-getAll-output').innerHTML = JSON.stringify(data, undefined, 4);
});
        </code>
    </pre>

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="appointment-getAll-output"></code>
    </pre>
    <!-- End Appointment->getAll -->

    <!-- Appointment->getByDateRange-->
    <h2 class="sidebar-link" id="appointment-getByDateRange"><code><a href="/api/v1/docs/appointment#getByDateRange" target="_blank" class="docs-link">getByDateRange</a></code></h2>
    <span>Request Type: <code>GET</code></span>
    <br />
    <code>todo</code>

    <!-- End Appointment->getByDateRange-->

    <!-- Appointment->get(id) -->
    <h2 class="sidebar-link" id="appointment-get"><code><a href="/api/v1/docs/appointment#get" target="_blank" class="docs-link">get/{id}</a></code></h2>
    <span>Request Type: <code>GET</code></span>

    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
apiGet('appointment', 'get/1', [], function(data){
    document.getElementById('appointment-get-output').innerHTML = JSON.stringify(data, undefined, 4);
});
        </code>
    </pre>

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="appointment-get-output"></code>
    </pre>
    <!-- End Appointment->get(id) -->

    <!-- Appointment->create -->
    <h2 class="sidebar-link" id="appointment-create"><code><a href="/api/v1/docs/appointment#create" target="_blank" class="docs-link">create</a></code></h2>
    <span>Request Type: <code>GET</code></span>
    <br />
    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
function createAppointment() {
    var apptData = {};
    var formElements = document.getElementById('appointment-create-form').elements;

    var startDate = new moment({
        year:   parseInt(formElements['appointment-year-start']) || 0,
        month:  parseInt(formElements['appointment-month-start']) || 0,
        day:    parseInt(formElements['appointment-day-start']) || 0
    });

    apptData['startDate'] = startDate.format('YYYY-MM-dd hh:mm');
    apptData['length'] = parseInt( formElements['appointment-length'] );

    apiGet('appointment', 'create', apptData, function(data){
        document.getElementById('appointment-create-output').innerHTML = JSON.stringify(data, undefined, 4);
    });
}
        </code>
    </pre>
    <br />

    <div class="row">
        <form class="form-horizontal col-md-6 col-sm-8" id="appointment-create-form" name="appointment-create-form">
            <div class="well">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="appointment-year-start" class="sr-only col-xs-12 control-label">Year</label>
                        <div class="col-xs-12">
                            <input type="text" id="appointment-year-start" class="form-control" placeholder="Year" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="appointment-month-start" class="sr-only col-xs-12 control-label">Month</label>
                        <div class="col-xs-12">
                            <input type="text" id="appointment-month-start" class="form-control" placeholder="Month" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="appointment-day-start" class="sr-only col-xs-12 control-label">Day</label>
                        <div class="col-xs-12">
                            <input type="text" id="appointment-day-start" class="form-control" placeholder="Day" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="appointment-hour-start" class="sr-only col-xs-12 control-label">Hour</label>
                        <div class="col-xs-12">
                            <input type="text" id="appointment-hour-start" class="form-control" placeholder="Hour" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="appointment-minute-start" class="sr-only col-xs-12 control-label">Minute</label>
                        <div class="col-xs-12">
                            <input type="text" id="appointment-minute-start" class="form-control" placeholder="Minute" />
                        </div>
                    </div>
                </div>
                <!-- todo: figure out how the length of an appointment will work -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="appointment-length-dd" class="sr-only col-xs-12 control-label">Appointment Length</label>
                        <div class="col-xs-12">
                            <select class="form-control" id="appointment-length-dd">
                                <option value="0">Select Appointment Length...</option>
                                <option value="30">30 Minutes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="appointment-status-dd" class="sr-only col-xs-12 control-label">Appointment Status</label>
                        <div class="col-xs-12">
                            <select class="form-control" id="appointment-status-dd"></select>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="appointment-create-member-dd" class="col-sm-4 control-label">Member</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="appointment-create-member-dd"></select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="appointment-create-coach-dd" class="col-sm-4 control-label">Coach</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="appointment-create-coach-dd"></select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <button type="button" value="submit" class="btn btn-success pull-right" onclick="createAppointment()">Create Appointment</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="appointment-create-output"></code>
    </pre>


    <!-- End Appointment->create -->

    <!-- Appointment->schedule -->
    <h2 class="sidebar-link" id="appointment-schedule"><code><a href="/api/v1/docs/appointment#schedule" target="_blank" class="docs-link">schedule</a></code></h2>
    <span>Request Type: <code>POST</code></span>
    <br />
    <code>todo</code>

    <!-- End Appointment->schedule -->

    <!-- End Appointment Controller -->
    <hr />

    <!-- Calendar Controller -->
    <h1 class="sidebar-link" id="calendar">Calendar</h1>

    <!-- Calendar->embed -->
    <h2 class="sidebar-link" id="calendar-embed"><code><a href="/api/v1/docs/calendar#embed" class="docs-link">embed</a></code></h2>
    <span>Request Type: <code>GET</code></span>
    <div>
        <?php
        $year   = (int)date('Y');
        $month  = (int)date('n');
        $day    = (int)date('j');
        ?>
        <iframe id="calendar-iframe" scrolling="no" src="/api/v1/calendar/embed/<?=$year?>/<?=$month?>/<?=$day?>"></iframe>
    </div>
    <!-- End Calendar->embed -->

    <!-- End Calendar Controller -->
    <hr />

    <!-- Config Controller -->
    <h1 class="sidebar-link" id="config">Config</h1>
    <br />
    <code>todo</code>

    <!-- End Config Controller -->
    <hr />

    <!-- Member Controller -->
    <h1 class="sidebar-link" id="member">Member</h1>
    <br />
    <code>todo</code>

    <!-- End Member Controller -->
    <hr />

    <!-- User Controller -->
    <h1 class="sidebar-link" id="user">User</h1>

    <!-- User->getAll -->
    <h2 class="sidebar-link" id="user-getAll"><code><a href="/api/v1/docs/user#getAll" target="_blank" class="docs-link">getAll</a></code></h2>
    <span>Request Type: <code>GET</code></span>

    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
apiGet('user', 'all', [], function(data){
    document.getElementById('user-getAll-output').innerHTML = JSON.stringify(data, undefined, 4);
});
        </code>
    </pre>

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="user-getAll-output"></code>
    </pre>
    <!-- End User->getAll -->

    <!-- User->get(id) -->
    <h2 class="sidebar-link" id="user-get"><code><a href="/api/v1/docs/user#get" target="_blank" class="docs-link">get/{id}</a></code></h2>
    <span>Request Type: <code>GET</code></span>

    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
apiGet('user', 'get/1', [], function(data){
    document.getElementById('user-get-output').innerHTML = JSON.stringify(data, undefined, 4);
});
        </code>
    </pre>

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="user-get-output"></code>
    </pre>
    <!-- End User->get(id) -->

    <!-- User->create -->
    <h2 class="sidebar-link" id="user-create"><code><a href="/api/v1/docs/user#create" target="_blank" class="docs-link">create</a></code></h2>
    <span>Request Type: <code>GET</code></span>
    <br />
    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
function createUser() {
     var userData = {};
    var formElements = document.getElementById('user-create-form').elements;

    userData['email']       = formElements['email-address'].value;
    userData['first_name']  = formElements['first-name'].value;
    userData['last_name']   = formElements['last-name'].value;
    userData['phone']       = formElements['phone-number'].value;
    userData['type']        = parseInt(formElements['user-type-dd'].value);

    apiGet('user', 'create', userData, function(data){
        document.getElementById('user-create-output').innerHTML = JSON.stringify(data, undefined, 4);
    });
}
        </code>
    </pre>
    <br />

    <div class="row">
        <form class="form-horizontal col-md-6 col-sm-8" id="user-create-form" name="user-create-form">
            <div class="well">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="email-address" class="sr-only col-xs-12 control-label">Email Address</label>
                        <div class="col-xs-12">
                            <input type="text" id="email-address" class="form-control" placeholder="Email Address" onchange="checkCreateEmail();" />
                            <span id="create-email-msg" class="text-danger" style="display: inline;">Invalid email address</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="first-name" class="sr-only col-xs-12 control-label">First Name</label>
                        <div class="col-xs-12">
                            <input type="text" id="first-name" class="form-control" placeholder="First Name" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last-name" class="sr-only col-xs-12 control-label">Last Name</label>
                        <div class="col-xs-12">
                            <input type="text" id="last-name" class="form-control" placeholder="Last Name" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone-number" class="sr-only col-xs-12 control-label">Phone Number</label>
                        <div class="col-xs-12">
                            <input type="tel" id="phone-number" class="form-control" placeholder="Phone Number" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="user-type-dd" class="sr-only col-xs-12 control-label">User Type</label>
                        <div class="col-xs-12">
                            <select class="form-control" id="user-type-dd"></select>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <button type="button" value="submit" class="btn btn-success pull-right" onclick="createUser()">Create</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="user-create-output"></code>
    </pre>
    <!-- End User->create -->

    <!-- User->delete -->
    <h2 class="sidebar-link" id="user-delete"><code><a href="/api/v1/docs/user#delete" target="_blank" class="docs-link">delete</a></code></h2>
    <span>Request Type: <code>DELETE</code></span>
    <br />
    <h3>JavaScript</h3>
    <pre class="test-code test-start">
        <code class="javascript">
function deleteUser(userID) {
    apiDelete('user', userID, function(data){
        document.getElementById('user-delete-output').innerHTML = JSON.stringify(data, undefined, 4);
    });
}
        </code>
    </pre>
    <br />
    <div class="form-inline">
        <div class="form-group">
            <label for="user-delete-dd">Select a user to delete</label>
            <select id="user-delete-dd" class="form-control">
                <option value="">Select...</option>
            </select>
        </div>
        <button class="btn btn-danger" onclick="deleteUser(document.getElementById('user-delete-dd').value)">Delete</button>
    </div>
    <br />

    <h3>Output</h3>
    <pre class="test-code test-output">
        <code class="json" id="user-delete-output"></code>
    </pre>
    <!-- End User->delete -->

    <!-- End User Controller -->
    <hr />

@endsection