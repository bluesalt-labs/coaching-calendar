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
    <span>Request Type: <code>POST</code></span>
    <br />
    <code>todo</code>

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
function createUser(userData) {
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
                        <label for="create-email-address" class="sr-only col-xs-12 control-label">Email Address</label>
                        <div class="col-xs-12">
                            <input type="text" id="create-email-address" class="form-control" placeholder="Email Address" onchange="checkCreateEmail();" />
                            <span id="create-email-msg" class="text-danger" style="display: inline;">Invalid email address</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="create-first-name" class="sr-only col-xs-12 control-label">First Name</label>
                        <div class="col-xs-12">
                            <input type="text" id="create-first-name" class="form-control" placeholder="First Name" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="create-last-name" class="sr-only col-xs-12 control-label">Last Name</label>
                        <div class="col-xs-12">
                            <input type="text" id="create-last-name" class="form-control" placeholder="Last Name" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="create-phone-number" class="sr-only col-xs-12 control-label">Phone Number</label>
                        <div class="col-xs-12">
                            <input type="tel" id="create-phone-number" class="form-control" placeholder="Phone Number" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="create-user-type-dd" class="sr-only col-xs-12 control-label">User Type</label>
                        <div class="col-xs-12">
                            <select class="form-control" id="create-user-type-dd"></select>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <button type="button" value="submit" class="btn btn-success pull-right" onclick="createUser()">Create</button>
                </div>
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