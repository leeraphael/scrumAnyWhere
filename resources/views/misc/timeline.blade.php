@extends('app')

@section('head')
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="{{ asset('/js/timeline.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/timeline.css') }}">

    <script type="text/javascript">
        var timeline = undefined;
        var data = undefined;

        google.load("visualization", "1");

        // Set callback to run when API is loaded
        google.setOnLoadCallback(drawVisualization);

        function getSelectedRow() {
            var row = undefined;
            var sel = timeline.getSelection();
            if (sel.length) {
                if (sel[0].row != undefined) {
                    row = sel[0].row;
                }
            }
            return row;
        }

        // Called when the Visualization API is loaded.
        function drawVisualization() {
            // Create and populate a data table.
            data = new google.visualization.DataTable();
            data.addColumn('datetime', 'start');
            data.addColumn('datetime', 'end');
            data.addColumn('string', 'content');

            data.addRows([
                [new Date(2015,05,22), new Date(2015,05,26), '<div>Database Rework</div>'],
                [new Date(2015,04,23), new Date(2015,04,28), '<div>Web Rework</div>'],
                [new Date(2015,01,23), new Date(2015,02,05), '<div>APP Rework</div>'],
                [new Date(2015,05,24), , '<div>Database Rework</div>'],
            ]);

            // specify options
            var options = {
                width:  "100%",
                height: "300px",
                editable: true // make the events dragable
            };

            // Instantiate our timeline object.
            timeline = new links.Timeline(document.getElementById('mytimeline'), options);

            // Make a callback function for the select event
            var onselect = function (event) {
                var row = getSelectedRow();
                document.getElementById("info").innerHTML += "event " + row + " selected<br>";
                // Note: you can retrieve the contents of the selected row with
                //       data.getValue(row, 2);
            }

            // callback function for the change event
            var onchanged = function (event) {
                // retrieve the changed row
                var row = getSelectedRow();

                if (row != undefined) {
                    // request approval from the user.
                    // You can choose your own approval mechanism here, for example
                    // send data to a server which responds with approved/denied
                    var approve = confirm("Are you sure you want to move the event?");

                    if (approve)  {
                        document.getElementById("info").innerHTML += "event " + row + " changed<br>";
                    } else {
                        // new date NOT approved. cancel the change
                        timeline.cancelChange();

                        document.getElementById("info").innerHTML += "change of event " + row + " cancelled<br>";
                    }
                }
            };

            // callback function for the delete event
            var ondelete = function (event) {
                // retrieve the row to be deleted
                var row = getSelectedRow();

                if (row != undefined) {
                    // request approval from the user.
                    // You can choose your own approval mechanism here, for example
                    // send data to a server which responds with approved/denied
                    var approve = confirm("Are you sure you want to delete the event?");

                    if (approve)  {
                        document.getElementById("info").innerHTML += "event " + row + " deleted<br>";
                    } else {
                        // new date NOT approved. cancel the change
                        timeline.cancelDelete();

                        document.getElementById("info").innerHTML += "deleting event " + row + " cancelled<br>";
                    }
                }
            };


            // callback function for adding an event
            var onadd = function (event) {
                // retrieve the row to be deleted
                var row = getSelectedRow();

                if (row != undefined) {
                    // request approval from the user.
                    // You can choose your own approval mechanism here, for example
                    // send data to a server which responds with approved/denied
                    var title = prompt("Enter a title for the new event", "New event");

                    if (title != undefined)  {
                        data.setValue(row, 2, title);
                        document.getElementById("info").innerHTML += "event " + row + " created<br>";
                        timeline.redraw();
                    } else {
                        // cancel adding a new event
                        timeline.cancelAdd();

                        document.getElementById("info").innerHTML += "creating event " + row + " cancelled<br>";
                    }
                }
            }

            // Add event listeners
            google.visualization.events.addListener(timeline, 'select', onselect);
            google.visualization.events.addListener(timeline, 'changed', onchanged);
            google.visualization.events.addListener(timeline, 'delete', ondelete);
            google.visualization.events.addListener(timeline, 'add', onadd);

            // Draw our timeline with the created data and options
            timeline.draw(data);
        }
    </script>
@endsection

@section('main')
	<div class="col-sm-offset-0 col-sm-12 column">
		<p>This page demonstrates the timeline visualization.</p>
		<p>Click and drag to move the timeline, scroll to zoom the timeline.
		    Click and drag events to change there date.
		    You will be asked for confirmation before changes are actually applied.</p>
		<div id="mytimeline"></div>

		<!-- Information about where the used icons come from -->
		<p style="color:gray; font-size:10px; font-style:italic;">
		    Icons by <a href="http://dryicons.com" target="_blank" title="Aesthetica 2 Icons by DryIcons" style="color:gray;" >DryIcons</a>
		    and <a href="http://www.tpdkdesign.net" target="_blank" title="Refresh Cl Icons by TpdkDesign.net" style="color:gray;" >TpdkDesign.net</a>
		</p>

		<div id="info"></div>
	</div>
@endsection

