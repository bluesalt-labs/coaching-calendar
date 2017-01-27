@extends('layouts.test')

@section('title', 'Home')

@section('content')
    @parent

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
    <h2 class="sidebar-link" id="calendar-embed"><code><a href="/api/v1/docs/calendar#embed" target="_blank" class="docs-link">embed</a></code></h2>
    <span>Request Type: <code>GET</code></span>
    <div>
        <?php
        $year   = (int)date('Y');
        $month  = (int)date('n');
        $day    = (int)date('j');
        ?>
        <iframe id="calendar-iframe" scrolling="no" src="/calendar/embed/<?=$year?>/<?=$month?>/<?=$day?>"></iframe>
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
    <span>Request Type: <code>POST</code></span>
    <br />
    <code>todo</code>
    <!-- End User->create -->

    <!-- User->delete -->
    <h2 class="sidebar-link" id="user-delete"><code><a href="/api/v1/docs/user#delete" target="_blank" class="docs-link">delete</a></code></h2>
    <span>Request Type: <code>DELETE</code></span>
    <br />
    <code>todo</code>

    <!-- End User->delete -->

    <!-- End User Controller -->
    <hr />

    <script type="text/javascript">
        //function get
        document.addEventListener("DOMContentLoaded", function() {
            highlightExisting();

            apiGet('appointment', 'all', [], outputDataTo.bind(this, 'appointment-getAll-output'));
            apiGet('appointment', 'get/1', [], outputDataTo.bind(this, 'appointment-get-output'));
            apiGet('user', 'all', [], outputDataTo.bind(this, 'user-getAll-output'));
            apiGet('user', 'get/1', [], outputDataTo.bind(this, 'user-get-output'));
        });

        function outputDataTo() {
            var block = document.getElementById(arguments[0])
            block.innerHTML = JSON.stringify(arguments[1], undefined, 4);
            hljs.highlightBlock(block);
        }

        function highlightExisting() {
            var elements = document.querySelectorAll('pre.test-start > code');
            for(var i = 0; i < elements.length; i++) {
                hljs.highlightBlock(elements[i]);
            }
        }
    </script>

@endsection