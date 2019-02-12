/*!
 *
 * Centric - Bootstrap Admin Template
 *
 * Version: 1.9.5
 * Author: @themicon_co
 * Website: http://themicon.co
 * License: https://wrapbootstrap.com/help/licenses
 *
 */

// APP START
// -----------------------------------

(function() {
    'use strict';

    // Disable warning "Synchronous XMLHttpRequest on the main thread is deprecated.."
    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
        options.async = true;
    });

    // Support for float labels on inputs
    $(document).on('change', '.mda-form-control > input', function() {
        $(this)[this.value.length ? 'addClass' : 'removeClass']('has-value');
    });
})();

(function(global) {
    'use strict';

    global.APP_COLORS = {
        'gray-darker':            '#263238',
        'gray-dark':              '#455A64',
        'gray':                   '#607D8B',
        'gray-light':             '#90A4AE',
        'gray-lighter':           '#ECEFF1',

        'primary':                '#448AFF',
        'success':                '#4CAF50',
        'info':                   '#03A9F4',
        'warning':                '#FFB300',
        'danger':                 '#F44336'
    };
})(window);

(function(global) {
    'use strict';

    global.Colors = new ColorsHandler();

    function ColorsHandler() {
        this.byName = byName;

        ////////////////

        function byName(name) {
            var color = APP_COLORS[name];
            if (!color && (typeof materialColors !== 'undefined')) {
                var c = name.split('-'); // red-500, blue-a100, deepPurple-500, etc
                if (c.length)
                    color = (materialColors[c[0]] || {})[c[1]];
            }
            return (color || '#fff');
        }
    }
})(window);

(function() {
    'use strict';

    $(initDashboard);

    function initDashboard() {

        if (!$.fn.plot || !$.fn.easyPieChart) return;

        // Main Flot chart
        var splineData = [{
            'label': 'Clicks',
            'color': Colors.byName('purple-300'),
            data: [
                ['1', 40],
                ['2', 50],
                ['3', 40],
                ['4', 50],
                ['5', 66],
                ['6', 66],
                ['7', 76],
                ['8', 96],
                ['9', 90],
                ['10', 105],
                ['11', 125],
                ['12', 135]

            ]
        }, {
            'label': 'Unique',
            'color': Colors.byName('green-400'),
            data: [
                ['1', 30],
                ['2', 40],
                ['3', 20],
                ['4', 40],
                ['5', 80],
                ['6', 90],
                ['7', 70],
                ['8', 60],
                ['9', 90],
                ['10', 150],
                ['11', 130],
                ['12', 160]
            ]
        }, {
            'label': 'Recurrent',
            'color': Colors.byName('blue-500'),
            data: [
                ['1', 10],
                ['2', 20],
                ['3', 10],
                ['4', 20],
                ['5', 6],
                ['6', 10],
                ['7', 32],
                ['8', 26],
                ['9', 20],
                ['10', 35],
                ['11', 30],
                ['12', 56]

            ]
        }];
        var splineOptions = {
            series: {
                lines: {
                    show: false
                },
                points: {
                    show: false,
                    radius: 3
                },
                splines: {
                    show: true,
                    tension: 0.39,
                    lineWidth: 5,
                    fill: 1,
                    fillColor: Colors.byName('primary')
                }
            },
            grid: {
                borderColor: '#eee',
                borderWidth: 0,
                hoverable: true,
                backgroundColor: 'transparent'
            },
            tooltip: true,
            tooltipOpts: {
                content: function(label, x, y) {
                    return x + ' : ' + y;
                }
            },
            xaxis: {
                tickColor: 'transparent',
                mode: 'categories',
                font: {
                    color: Colors.byName('blueGrey-200')
                }
            },
            yaxis: {
                show: false,
                min: 0,
                max: 220, // optional: use it for a clear representation
                tickColor: 'transparent',
                font: {
                    color: Colors.byName('blueGrey-200')
                },
                //position: 'right' or 'left',
                tickFormatter: function(v) {
                    return v /* + ' visitors'*/ ;
                }
            },
            shadowSize: 0
        };

        $('#flot-main-spline').each(function() {
            var $el = $(this);
            if ($el.data('height')) $el.height($el.data('height'));
            $el.plot(splineData, splineOptions);
        });


        // Bar chart stacked
        // ------------------------
        var stackedChartData = [{
            data: [
                [1, 45],
                [2, 42],
                [3, 45],
                [4, 43],
                [5, 45],
                [6, 47],
                [7, 45],
                [8, 42],
                [9, 45],
                [10, 43]
            ]
        }, {
            data: [
                [1, 35],
                [2, 35],
                [3, 17],
                [4, 29],
                [5, 10],
                [6, 7],
                [7, 35],
                [8, 35],
                [9, 17],
                [10, 29]
            ]
        }];

        var stackedChartOptions = {
            bars: {
                show: true,
                fill: true,
                barWidth: 0.3,
                lineWidth: 1,
                align: 'center',
                // order : 1,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                }
            },
            colors: [Colors.byName('blue-100'), Colors.byName('blue-500')],
            series: {
                shadowSize: 3
            },
            xaxis: {
                show: true,
                position: 'bottom',
                ticks: 10,
                font: {
                    color: Colors.byName('blueGrey-200')
                }
            },
            yaxis: {
                show: false,
                min: 0,
                max: 60,
                font: {
                    color: Colors.byName('blueGrey-200')
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderWidth: 0,
                color: 'rgba(120,120,120,0.5)'
            },
            tooltip: true,
            tooltipOpts: {
                content: 'Value %x.0 is %y.0',
                defaultTheme: false,
                shifts: {
                    x: 0,
                    y: -20
                }
            }
        };

        $('#flot-stacked-chart').each(function() {
            var $el = $(this);
            if ($el.data('height')) $el.height($el.data('height'));
            $el.plot(stackedChartData, stackedChartOptions);
        });


        // Flot bar chart
        // ------------------
        var barChartOptions = {
            series: {
                bars: {
                    show: true,
                    fill: 1,
                    barWidth: 0.2,
                    lineWidth: 0,
                    align: 'center'
                },
                highlightColor: 'rgba(255,255,255,0.2)'
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderWidth: 0,
                color: '#8394a9'
            },
            tooltip: true,
            tooltipOpts: {
                content: function getTooltip(label, x, y) {
                    return 'Visitors for ' + x + ' was ' + (y * 1000);
                }
            },
            xaxis: {
                tickColor: 'transparent',
                mode: 'categories',
                font: {
                    color: Colors.byName('blueGrey-200')
                }
            },
            yaxis: {
                tickColor: 'transparent',
                font: {
                    color: Colors.byName('blueGrey-200')
                }
            },
            legend: {
                show: false
            },
            shadowSize: 0
        };

        var barChartData = [{
            'label': 'New',
            bars: {
                order: 0,
                fillColor: Colors.byName('primary')
            },
            data: [
                ['Jan', 20],
                ['Feb', 15],
                ['Mar', 25],
                ['Apr', 30],
                ['May', 40],
                ['Jun', 35]
            ]
        }, {
            'label': 'Recurrent',
            bars: {
                order: 1,
                fillColor: Colors.byName('green-400')
            },
            data: [
                ['Jan', 35],
                ['Feb', 25],
                ['Mar', 45],
                ['Apr', 25],
                ['May', 30],
                ['Jun', 15]
            ]
        }];

        $('#flot-bar-chart').each(function() {
            var $el = $(this);
            if ($el.data('height')) $el.height($el.data('height'));
            $el.plot(barChartData, barChartOptions);
        });

        // Small flot chart
        // ---------------------
        var chartTaskData = [{
            'label': 'Total',
            color: Colors.byName('primary'),
            data: [
                ['Jan', 14],
                ['Feb', 14],
                ['Mar', 12],
                ['Apr', 16],
                ['May', 13],
                ['Jun', 14],
                ['Jul', 19]
                //4, 4, 3, 5, 3, 4, 6
            ]
        }];
        var chartTaskOptions = {
            series: {
                lines: {
                    show: false
                },
                points: {
                    show: false
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 3,
                    fill: 1
                },
            },
            legend: {
                show: false
            },
            grid: {
                show: false,
            },
            tooltip: true,
            tooltipOpts: {
                content: function(label, x, y) {
                    return x + ' : ' + y;
                }
            },
            xaxis: {
                tickColor: '#fcfcfc',
                mode: 'categories'
            },
            yaxis: {
                min: 0,
                max: 30, // optional: use it for a clear representation
                tickColor: '#eee',
                //position: 'right' or 'left',
                tickFormatter: function(v) {
                    return v /* + ' visitors'*/ ;
                }
            },
            shadowSize: 0
        };

        $('#flot-task-chart').each(function() {
            var $el = $(this);
            if ($el.data('height')) $el.height($el.data('height'));
            $el.plot(chartTaskData, chartTaskOptions);
        });

        // Easy Pie charts
        // -----------------

        var pieOptionsTask = {
            lineWidth: 6,
            trackColor: 'transparent',
            barColor: Colors.byName('primary'),
            scaleColor: false,
            size: 90,
            lineCap: 'round',
            animate: {
                duration: 3000,
                enabled: true
            }
        };
        $('#dashboard-easypiechartTask').easyPieChart(pieOptionsTask);


        // Vector Map
        // -----------------

        // USA Map
        var usa_markers = [{
            latLng: [40.71, -74.00],
            name: 'New York'
        }, {
            latLng: [34.05, -118.24],
            name: 'Los Angeles'
        }, {
            latLng: [41.87, -87.62],
            name: 'Chicago',
            style: {
                fill: Colors.byName('pink-500'),
                r: 15
            }
        }, {
            latLng: [29.76, -95.36],
            name: 'Houston',
            style: {
                fill: Colors.byName('purple-500'),
                r: 10
            }
        }, {
            latLng: [39.95, -75.16],
            name: 'Philadelphia'
        }, {
            latLng: [38.90, -77.03],
            name: 'Washington'
        }, {
            latLng: [37.36, -122.03],
            name: 'Silicon Valley',
            style: {
                fill: Colors.byName('green-500'),
                r: 20
            }
        }];

        var usa_options = {
            map: 'us_mill_en',
            normalizeFunction: 'polynomial',
            backgroundColor: '#fff',
            regionsSelectable: false,
            markersSelectable: false,
            zoomButtons: false,
            zoomOnScroll: false,
            markers: usa_markers,
            regionStyle: {
                initial: {
                    fill: Colors.byName('blueGrey-200')
                },
                hover: {
                    fill: Colors.byName('gray-light'),
                    stroke: '#fff'
                },
            },
            markerStyle: {
                initial: {
                    fill: Colors.byName('blue-500'),
                    stroke: '#fff',
                    r: 10
                },
                hover: {
                    fill: Colors.byName('orange-500'),
                    stroke: '#fff'
                }
            }
        };

        $('#vector-map').vectorMap(usa_options);

        // Datepicker
        // -----------------

        $('#dashboard-datepicker').datepicker();

        // Sparklines
        // -----------------

        var sparkValue1 = [4, 4, 3, 5, 3, 4, 6, 5, 3, 2, 3, 4, 6];
        var sparkValue2 = [2, 3, 4, 6, 5, 4, 3, 5, 4, 3, 4, 3, 4, 5];
        var sparkValue3 = [4, 4, 3, 5, 3, 4, 6, 5, 3, 2, 3, 4, 6];
        var sparkValue4 = [6, 5, 4, 3, 5, 4, 3, 4, 3, 4, 3, 2, 2];
        var sparkOpts = {
            type: 'line',
            height: 20,
            width: '70',
            lineWidth: 2,
            valueSpots: {
                '0:': Colors.byName('blue-700'),
            },
            lineColor: Colors.byName('blue-700'),
            spotColor: Colors.byName('blue-700'),
            fillColor: 'transparent',
            highlightLineColor: Colors.byName('blue-700'),
            spotRadius: 0
        };

        initSparkline($('#sparkline1'), sparkValue1, sparkOpts);
        initSparkline($('#sparkline2'), sparkValue2, sparkOpts);
        initSparkline($('#sparkline3'), sparkValue3, sparkOpts);
        initSparkline($('#sparkline4'), sparkValue4, sparkOpts);
        // call sparkline and mix options with data attributes
        function initSparkline(el, values, opts) {
            el.sparkline(values, $.extend(sparkOpts, el.data()));
        }

    }
})();

(function() {
    'use strict';

    $(runBootstrap);

    function runBootstrap() {

        // POPOVER
        // -----------------------------------

        $('[data-toggle="popover"]').popover();

        // TOOLTIP
        // -----------------------------------

        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

    }
})();

(function() {
    'use strict';

    $(runMasonry);

    function runMasonry() {

        if( ! $.fn.imagesLoaded ) return;

        // init Masonry after all images have loaded
        var $grid = $('.grid').imagesLoaded(function() {
            $grid.masonry({
                itemSelector: '.grid-item',
                percentPosition: true,
                columnWidth: '.grid-sizer'
            });
        });
    }
})();

(function() {
    'use strict';

    $(formValidation);

    function formValidation() {

        $('#form-register').validate({
            errorPlacement: errorPlacementInput,
            // Form rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password1: {
                    required: true
                },
                confirm_match: {
                    required: true,
                    equalTo: '#id-password'
                }
            }
        });

        $('#form-login').validate({
            errorPlacement: errorPlacementInput,
            // Form rules
            rules: {
                loginemail: {
                    required: true,
                    email: true
                },
                loginpassword: {
                    required: true
                }
            }
        });

        $('#form-subscribe').validate({
            errorPlacement: errorPlacementInput,
            // Form rules
            rules: {
                feedemail: {
                    required: true,
                    email: true
                }
            }
        });

        $('#form-example').validate({
            errorPlacement: errorPlacementInput,
            // Form rules
            rules: {
                sometext: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                digits: {
                    required: true,
                    digits: true
                },
                url: {
                    required: true,
                    url: true
                },
                min: {
                    required: true,
                    min: 6
                },
                max: {
                    required: true,
                    max: 6
                },
                minlength: {
                    required: true,
                    minlength: 6
                },
                maxlength: {
                    required: true,
                    maxlength: 10
                },
                length: {
                    required: true,
                    range: [6,10]
                },
                match1: {
                    required: true
                },
                confirm_match: {
                    required: true,
                    equalTo: '#id-source'
                }
            }
        });

    }

    // Necessary to place dyncamic error messages
    // without breaking the expected markup for custom input
    function errorPlacementInput(error, element) {
        if( element.parent().parent().is('.mda-input-group') ) {
            error.insertAfter(element.parent().parent()); // insert at the end of group
        }
        else if( element.parent().is('.mda-form-control') ) {
            error.insertAfter(element.parent()); // insert after .mda-form-control
        }
        else if ( element.is(':radio') || element.is(':checkbox')) {
            error.insertAfter(element.parent());
        }
        else {
            error.insertAfter(element);
        }
    }
})();

(function() {
    'use strict';

    $(googleMaps);

    function googleMaps() {
        if (document.getElementById('map')) {
            var map = new GMaps({
                div: '#map',
                lat: -12.043333,
                lng: -77.028333
            });

            GMaps.geocode({
                address: '276 N TUSTIN ST, ORANGE, CA 92867',
                callback: function(results, status) {
                    if (status === 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng()
                        });
                    }
                }
            });
        }

        if (document.getElementById('map-markers')) {
            $(googleMapsDevices);
        }

        if (document.getElementById('map-markers-alerts')) {

            var mapMarkers = new GMaps({
                div: '#map-markers-alerts',
                lat: -34.932968,
                lng: -60.125821,
                zoom: 12
            });
            mapMarkers.addMarker({
                lat: -34.933689,
                lng: -60.143716,
                infoWindow: {
                    content: '<a href="/spears/1">Lanza #67110023</a>'
                }
            });
            mapMarkers.addMarker({
                lat: -34.925419,
                lng: -60.120616,
                infoWindow: {
                    content: '<a href="/spears/2">Lanza #62572226</a>'
                }
            });
        }

    }
})();

(function(){
    'use strict';

    $(initModal);

    function initModal() {

        $('#compose').on('click', function(){
            $('.loader-inner').hide();
            $('#buttonlabel').show();
            $('.modal-compose').modal();
            $("#modal-submit").removeAttr("disabled");
        });

        $('#modal-submit').on('click', function(){
            $('#buttonlabel').hide();
            $('.loader-inner').show();
            $("#modal-submit").attr("disabled", "disabled");
            $(".form-ajax").submit();
        });

        $('#modal-submit2').on('click', function(){
            $('#buttonlabel2').hide();
            $('.loader-inner').show();
            $("#modal-submit2").attr("disabled", "disabled");
            $("#formResetPassword").submit();
        });
    }

})();

(function(){
    'use strict';

    $(initLands);

    function initLands() {

        bindDeleteLand();

        $('#formLands').ajaxForm({
            error: function() {
                $('.modal-compose').modal('toggle');
                $('#formLands').find("input[type=text], textarea").val("");
                
                swal('Ooops!', 'Hubo un error. Ya quedó registrado en el Log!', 'error');
            },
            success: function(data) {
                $('.modal-compose').modal('toggle');
                $('#formLands').find("input[type=text], textarea").val("");

                $('#datatable1').DataTable().row.add( [
                    data.id,
                    '<a href="/lands/'+data.id+'">'+data.description+'</a>',
                    data.createdAt,
                    '<a data-id="'+data.id+'" class="btn ion-android-delete delete-land" href="#"></a>'
                ] ).draw( false );

                $('#datatable1 tr:last').addClass('row-' + data.id);

                bindDeleteLand();
            }
        });
    }

    function bindDeleteLand() {
        $('.delete-land').on('click', function(e) {
            var id = $(this).data('id');
            e.preventDefault();
            swal({
                title: 'Estás seguro?',
                text: 'Vas a borrar este campo y todos sus componentes asociados!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({url: '/lands/' + id, type: 'DELETE'});
                    $('#datatable1').DataTable()
                        .row('.row-' + id)
                        .remove()
                        .draw();
                }
            });

        });
    }
})();

(function(){
    'use strict';

    $(initSilobags);

    function initSilobags() {

        bindDeleteSilobag();

        $('#formSilobags').ajaxForm({
            error: function() {
                $('.modal-compose').modal('toggle');
                $('#formSilobags').find("input[type=text], textarea").val("");
                
                swal('Ooops!', 'Hubo un error. Ya quedó registrado en el Log!', 'error');
            },
            success: function(data) {
                var land = $("#land option:selected").text();
                $('.modal-compose').modal('toggle');
                $('#formSilobags').find("input[type=text], textarea").val("");

                $('#datatable1').DataTable().row.add( [
                    data.id,
                    '<a href="/silobags/'+data.id+'">'+data.description+'</a>',
                    land,
                    data.createdAt,
                    '<a data-id="'+data.id+'" class="btn ion-android-delete delete-silobag" href="#"></a>'
                ] ).draw( false );

                $('#datatable1 tr:last').addClass('row-' + data.id);

                bindDeleteSilobag();
            }
        });
    }

    function bindDeleteSilobag() {
        $('.delete-silobag').on('click', function(e) {
            var id = $(this).data('id');
            e.preventDefault();
            swal({
                title: 'Estás seguro?',
                text: 'Vas a borrar esta silobolsa y todos sus componentes asociados!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({url: '/silobags/' + id, type: 'DELETE'});
                    $('#datatable1').DataTable()
                        .row('.row-' + id)
                        .remove()
                        .draw();
                }
            });

        });
    }
})();



(function(){
    'use strict';

    $(initDashboard2);

    function initDashboard2() {

        $('#datatableDashboard').DataTable( {
            "order": [[ 2, "desc" ]],
            "paging": false,
            "bInfo": false,
            "searching": false
        } );

    }


})();


(function(){
    'use strict';

    $(initOrganizations);

    function initOrganizations() {

        bindDeleteOrganization();

        $('#formOrganizations').ajaxForm({
            error: function() {
                $('.modal-compose').modal('toggle');
                $('#formOrganizations').find("input[type=text], input[type=password], textarea").val("");
                
                swal('Ooops!', 'Hubo un error. Ya quedó registrado en el Log!', 'error');
            },
            beforeSubmit: function(arr, $form, options) { 
                var organization = $('#organization').fieldValue()[0];
                var fullname = $('#fullname').fieldValue()[0];
                var email = $('#email').fieldValue()[0];
                var password1 = $('#password1').fieldValue()[0];
                var password2 = $('#password2').fieldValue()[0];
                
                if (!organization) {
                    validationError('Ingrese el nombre de la organización!');
                    return false;
                }

                if (!fullname) {
                    validationError('Ingrese el nombre y apellido del responsable!');
                    return false;
                }

                if (!email) {
                    validationError('Ingrese el email!');
                    return false;
                }

                if (!isEmail(email)) {
                    validationError('Ingrese un email válido!');
                    return false;
                }

                if (!password1) {
                    validationError('Ingrese la contraseña!');
                    return false;
                }

                if (password1 != password2) {
                    validationError('Las contraseñas no son iguales!');
                    return false;
                }
            },
            success: function(data) {

                $('.modal-compose').modal('toggle');
                $('#formSilobags').find("input[type=text], input[type=password], textarea").val("");

                $('#datatable1').DataTable().row.add( [
                    data.id,
                    data.description,
                    data.createdAt,
                    '<a data-id="'+data.id+'" class="btn ion-android-delete delete-organization" href="#"></a>'
                ] ).draw( false );

                $('#datatable1 tr:last').addClass('row-' + data.id);

                bindDeleteOrganization();
            }
        });

        function isEmail(email) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
        }

        function validationError(msg) {
            swal('Ooops!', msg, 'error');
            $('.loader-inner').hide();
            $('#buttonlabel').show();
            $("#modal-submit").removeAttr("disabled");
        }
    }

    function bindDeleteOrganization() {
        $('.delete-organization').on('click', function(e) {
            var id = $(this).data('id');
            e.preventDefault();
            swal({
                title: 'Estás seguro?',
                text: 'Vas a borrar esta empresa y todos sus componentes asociados!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({url: '/organizations/' + id, type: 'DELETE'});
                    $('#datatable1').DataTable()
                        .row('.row-' + id)
                        .remove()
                        .draw();
                }
            });

        });
    }
})();


(function(){
    'use strict';

    $(initDevices);

    function initDevices() {

        bindDeleteDevice();

        $('#formDevices').ajaxForm({
            error: function() {
                $('.modal-compose').modal('toggle');
                $('#formDevices').find("input[type=text], textarea").val("");
                
                swal('Ooops!', 'Hubo un error. Ya quedó registrado en el Log!', 'error');
            },
            success: function(data) {
                
                var silobag = $("#silobag option:selected").text();
                var land = $("#silobag option:selected").closest('optgroup').prop('label');

                $('.modal-compose').modal('toggle');
                $('#formDevices').find("input[type=text], textarea").val("");

                $('#datatable1').DataTable().row.add( [
                    data.id,
                    '<a href="/spears/' + data.id + '">' + data.idLess + '</a>',
                    silobag,
                    land,
                    data.createdAt,
                    '<a data-id="'+data.id+'" class="btn ion-android-delete delete-device" href="#"></a>'
                ] ).draw( false );

                $('#datatable1 tr:last').addClass('row-' + data.id);

                bindDeleteDevice();
            }
        });
    }

    function bindDeleteDevice() {

        $('.delete-device').on('click', function(e) {
            var id = $(this).data('id');
            e.preventDefault();
            swal({
                title: 'Estás seguro?',
                text: 'Vas a borrar esta dispositivo y todos sus componentes asociados!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({url: '/spears/' + id, type: 'DELETE'});
                    $('#datatable1').DataTable()
                        .row('.row-' + id)
                        .remove()
                        .draw();
                }
            });

        });
    }
})();

(function(){
    'use strict';

    $(initUsers);

    function initUsers() {

        bindDeleteUser();
        bindResetPassword();

        $('#formUsers').ajaxForm({
            error: function(data) {
                var msg = 'Hubo un error. Ya quedó registrado en el Log!';
                var errors = $.parseJSON(data.responseText);
                if (errors.message.indexOf("response") >= 0) {
                    var error = errors.message.substring(errors.message.indexOf("response"));
                        error = error.replace("\n", "");
                        error = error.replace("response:", "");
                        if (errors.message.indexOf("{}") < 0) {
                            msg = error;
                        }
                }
                $('.modal-compose').modal('toggle');
                $('#formUsers').find("input[type=text], textarea, input[type=password]").val("");
                
                swal('Ooops!', msg, 'error');
            },
            beforeSubmit: function(arr, $form, options) { 
                var fullname = $('#fullname').fieldValue()[0];
                var email = $('#email').fieldValue()[0];
                var password1 = $('#password1').fieldValue()[0];
                var password2 = $('#password2').fieldValue()[0];
                
                if (!fullname) {
                    validationError('Ingrese el nombre y apellido!');
                    return false;
                }

                if (!email) {
                    validationError('Ingrese el email!');
                    return false;
                }

                if (!isEmail(email)) {
                    validationError('Ingrese un email válido!');
                    return false;
                }

                if (!password1) {
                    validationError('Ingrese la contraseña!');
                    return false;
                }

                if (password1 != password2) {
                    validationError('Las contraseñas no son iguales!');
                    return false;
                }
            },
            success: function(data) {
                
                $('.modal-compose').modal('toggle');
                $('#formUsers').find("input[type=text], textarea, input[type=password]").val("");

                $('#datatable1').DataTable().row.add( [
                    data.id,
                    data.fullname,
                    data.email,
                    data.type.description,
                    data.createdAt,
                    '<a data-id="' + data.id + '" class="btn ion-android-delete delete-user" href="#"></a>',
                    '<a data-id="' + data.id + '" class="btn ion-ios-unlocked reset-password" href="#"></a>'
                ] ).draw( false );

                $('#datatable1 tr:last').addClass('row-' + data.id);

                bindDeleteUser();
                bindResetPassword();
            }
        });
    }

    function bindResetPassword() {

        $('.reset-password').on('click', function(){

            var id = $(this).data('id');

            $('.loader-inner').hide();
            $('#buttonlabel2').show();
            $('.modal-compose2').modal();
            $("#modal-submit2").removeAttr("disabled");

            $('#reset-fullname').val(jQuery(".row-" + id).find("td:eq(1)").text());
            $('#reset-id_user').val(id);
            $('#reset-email').val(jQuery(".row-" + id).find("td:eq(2)").text());

        });
    }

    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }

    function validationError(msg) {
        swal('Ooops!', msg, 'error');
        $('.loader-inner').hide();
        $('#buttonlabel').show();
        $("#modal-submit").removeAttr("disabled");
    }

    function bindDeleteUser() {

        $('.delete-user').on('click', function(e) {
            var id = $(this).data('id');
            e.preventDefault();
            swal({
                title: 'Estás seguro?',
                text: 'Vas a borrar este Usuario!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({url: '/users/' + id, type: 'DELETE'});
                    $('#datatable1').DataTable()
                        .row('.row-' + id)
                        .remove()
                        .draw();
                }
            });

        });
    }
})();


(function(){
    'use strict';

    $(initResetPassword);

    function initResetPassword() {

        $('#formResetPassword').ajaxForm({
            error: function(data) {
                var msg = 'Hubo un error. Ya quedó registrado en el Log!';
                var errors = $.parseJSON(data.responseText);
                if (errors.message.indexOf("response") >= 0) {
                    var error = errors.message.substring(errors.message.indexOf("response"));
                        error = error.replace("\n", "");
                        error = error.replace("response:", "");
                        if (errors.message.indexOf("{}") < 0) {
                            msg = error;
                        }
                }
                $('.modal-compose2').modal('toggle');
                $('#formResetPassword').find("input[type=text], textarea, input[type=password]").val("");
                
                swal('Ooops!', msg, 'error');
            },
            beforeSubmit: function(arr, $form, options) { 
                var password = $('#reset-password').fieldValue()[0];
                
                if (!password) {
                    validationError('Ingrese la contraseña!');
                    return false;
                }
            },
            success: function(data) {
                
                $('.modal-compose2').modal('toggle');
                $('#formResetPassword').find("input[type=text], textarea, input[type=password]").val("");
                swal('Éxito!', 'Cambiaste la contraseña correctamente!', 'success');
            }
        });
    }

    function validationError(msg) {
        swal('Ooops!', msg, 'error');
        $('.loader-inner').hide();
        $('#buttonlabel2').show();
        $("#modal-submit2").removeAttr("disabled");
    }

})();

(function() {
    'use strict';

    $(sidebarNav);

    function sidebarNav() {

        var $sidebarNav = $('.sidebar-nav');
        var $sidebarContent = $('.sidebar-content');

        activate($sidebarNav);

        $sidebarNav.on('click', function(event) {
            var item = getItemElement(event);
            // check click is on a tag
            if (!item) return;

            var ele = $(item),
                liparent = ele.parent()[0];

            var lis = ele.parent().parent().children(); // markup: ul > li > a
            // remove .active from childs
            lis.find('li').removeClass('active');
            // remove .active from siblings ()
            $.each(lis, function(idx, li) {
                if (li !== liparent)
                    $(li).removeClass('active');
            });

            var next = ele.next();
            if (next.length && next[0].tagName === 'UL') {
                ele.parent().toggleClass('active');
                event.preventDefault();
            }
        });

        // find the a element in click context
        // doesn't check deeply, asumens two levels only
        function getItemElement(event) {
            var element = event.target,
                parent = element.parentNode;
            if (element.tagName.toLowerCase() === 'a') return element;
            if (parent.tagName.toLowerCase() === 'a') return parent;
            if (parent.parentNode.tagName.toLowerCase() === 'a') return parent.parentNode;
        }

        function activate(sidebar) {
            sidebar.find('a').each(function() {
                var href = $(this).attr('href').replace('#', '');
                if (href !== '' && window.location.href.indexOf(href) >= 0) {
                    var item = $(this).parents('li').addClass('active');
                    // Animate scrolling to focus active item
                    // $sidebarContent.animate({
                    //     scrollTop: $sidebarContent.scrollTop() + item.position().top
                    // }, 1200);
                    return false; // exit foreach
                }
            });
        }

        var layoutContainer = $('.layout-container');
        var $body = $('body');
        // Handler to toggle sidebar visibility on mobile
        $('#sidebar-toggler').click(function(e) {
            e.preventDefault();
            layoutContainer.toggleClass('sidebar-visible');
            // toggle icon state
            $(this).parent().toggleClass('active');
        });
        // Close sidebar when click on backdrop
        $('.sidebar-layout-obfuscator').click(function(e) {
            e.preventDefault();
            layoutContainer.removeClass('sidebar-visible');
            // restore icon
            $('#sidebar-toggler').parent().removeClass('active');
        });

        // Handler to toggle sidebar visibility on desktop
        $('#offcanvas-toggler').click(function(e) {
            e.preventDefault();
            $body.toggleClass('offcanvas-visible');
            // toggle icon state
            $(this).parent().toggleClass('active');
        });

        // remove desktop offcanvas when app changes to mobile
        // so when it returns, the sidebar is shown again
        window.addEventListener('resize', function() {
            if (window.innerWidth < 768) {
                $body.removeClass('offcanvas-visible');
                $('#offcanvas-toggler').parent().addClass('active');
            }
        });

    }
})();

(function() {
    'use strict';

    $(tableDatatables);

    function tableDatatables() {

        

        // Zero configuration

        $('#datatable1').dataTable({
            'paging': false, // Table pagination
            'ordering': true, // Column ordering
            'info': false, // Bottom left status text
            'responsive': true, 
    
            // Text translation options
            // Note the required keywords between underscores (e.g _MENU_)
            oLanguage: {
                sSearch: '<em class="ion-search"></em>',
                sLengthMenu: '_MENU_ items encontrados',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                zeroRecords: 'Nothing found - sorry',
                infoEmpty: 'No records available',
                infoFiltered: '(filtered from _MAX_ total records)',
                oPaginate: {
                    sNext: '<em class="ion-ios-arrow-right"></em>',
                    sPrevious: '<em class="ion-ios-arrow-left"></em>'
                }
            }
        });

        $('#datatable3').dataTable({
            'paging': false, // Table pagination
            'ordering': true, // Column ordering
            'info': false, // Bottom left status text
            'responsive': true, 
    
            // Text translation options
            // Note the required keywords between underscores (e.g _MENU_)
            oLanguage: {
                sSearch: '<em class="ion-search"></em>',
                sLengthMenu: '_MENU_ items encontrados',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                zeroRecords: 'Nothing found - sorry',
                infoEmpty: 'No records available',
                infoFiltered: '(filtered from _MAX_ total records)',
                oPaginate: {
                    sNext: '<em class="ion-ios-arrow-right"></em>',
                    sPrevious: '<em class="ion-ios-arrow-left"></em>'
                }
            }
        });

        $('#datatable2').dataTable({
            'paging': true, // Table pagination
            'ordering': true, // Column ordering
            'info': false, // Bottom left status text
            'responsive': true
        });

        var inputSearchClass = 'datatable_input_col_search';
        var columnInputs = $('tfoot .' + inputSearchClass);

        // On input keyup trigger filtering
        columnInputs
            .keyup(function() {
                dtInstance2.fnFilter(this.value, columnInputs.index(this));
            });

    }
})();

(function() {
    'use strict';

    $(userLogin);

    function userLogin() {

        var $form = $('#user-login');
        $form.validate({
            errorPlacement: errorPlacementInput,
            // Form rules
            rules: {
                accountName: {
                    required: true,
                    email: true
                },
                accountPassword: {
                    required: true
                }
            },
            submitHandler: function(/*form*/) {
                // form.submit();
                console.log('Form submitted!');
            }
        });
    }

    // Necessary to place dyncamic error messages
    // without breaking the expected markup for custom input
    function errorPlacementInput(error, element) {
        if( element.parent().is('.mda-form-control') ) {
            error.insertAfter(element.parent()); // insert after .mda-form-control
        }
        else if ( element.is(':radio') || element.is(':checkbox')) {
            error.insertAfter(element.parent());
        }
        else {
            error.insertAfter(element);
        }
    }
})();

(function() {
    'use strict';

    $(userSignup);

    function userSignup() {

        var $form = $('#user-signup');
        $form.validate({
            errorPlacement: errorPlacementInput,
            // Form rules
            rules: {
                accountName: {
                    required: true,
                    email: true
                },
                accountPassword: {
                    required: true
                },
                accountPasswordCheck: {
                    required: true,
                    equalTo: '#account-password'
                }
            },
            submitHandler: function( /*form*/ ) {
                // form.submit();
                console.log('Form submitted!');
                $('#form-ok').hide().removeClass('hidden').show(500);
            }
        });
    }


    // Necessary to place dyncamic error messages
    // without breaking the expected markup for custom input
    function errorPlacementInput(error, element) {
        if (element.parent().is('.mda-form-control')) {
            error.insertAfter(element.parent()); // insert after .mda-form-control
        } else if (element.is(':radio') || element.is(':checkbox')) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
})();

(function() {
    'use strict';

    $(initSvgReplace);

    function initSvgReplace() {
        var elements = $('[data-svg-replace]');

        elements.each(function() {
            var el = $(this);
            var src = el.data('svgReplace');

            if (!src || src.indexOf('.svg') < 0)
                throw "only support for SVG images";
            // return /*only support for SVG images*/;

            $.get(src).success(function(res) {
                var $svg = $(res).find('svg');
                $svg = $svg.removeAttr('xmlns:a');
                el.replaceWith($svg);
            })
        })

    }
})();

(function() {
    'use strict';

    $(DeviceDetailView);

    function DeviceDetailView() 
    {
        if (typeof deviceChart != 'undefined') {
            deviceChart();
            deviceMap();
        }
    }
})();



(function() {
    'use strict';

    $(FlotCharts);
    $(bindCheckboxChart);
    $(bindGoChart);

    function bindCheckboxChart() 
    {
        $('.checkboxChart').click(function(){
            FlotCharts();
        });
    }


    function bindGoChart() 
    {
        $('#goChart').click(function(){
            FlotCharts();
        });
    }

    function FlotCharts() {

        if (!$.fn.plot) return;
        // LINE
        // -----------------------------------
        if (typeof idSilobag === 'undefined') {
            return;
        }

        // Go go go!
        var spears = [];
        $('.checkboxChart').each(function () 
        {
            if (this.checked) {
                spears.push($(this).val());
            }
        });

        $('.ion-checkmark').each(function() {
            $(this).css('background-color', '#FFF');
            $(this).css('border-color', '#EEE');
        });


        var start = 0;
        var end = 0;
        var dataPicker = $('#example-datepicker-5').data('datepicker');

        if (typeof dataPicker !== 'undefined') 
        {
            start = dataPicker.inputs[0].value;
            end = dataPicker.inputs[1].value;
        }

        var s = unit;
        var e = unit;
        if (unit == 0) {
            s = 1;
            e = 3;
        }

        for (var i = s; i <= e; i++) 
        {
            var uri = '/silobags/' + idSilobag + '/chart/' + i + '?spears=' + spears.join() + '&start=' + start + '&end=' + end;
                uri = encodeURI(uri);


            $.get(uri, function(data) 
            {
                var lineData = data.data;
                var lineOptions = {
                    series: {
                        lines: {
                            show: true,
                            fill: 0.00
                        },
                        points: {
                            show: true,
                            radius: 4
                        }
                    },
                    grid: {
                        borderColor: 'rgba(162,162,162,.26)',
                        borderWidth: 1,
                        hoverable: true,
                        backgroundColor: 'transparent'
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: function(label, x, y) {
                            return 'Lanza ' + label + ' : ' + Number(y).toFixed(2);
                        }
                    },
                    xaxis: {
                        tickColor: 'rgba(162,162,162,.26)',
                        font: {
                            color: '#000000'
                        },
                        mode: 'categories'
                    },
                    yaxis: {
                        // position: (isRTL ? 'right' : 'left'),
                        tickColor: 'rgba(162,162,162,.26)',
                        font: {
                            color: '#000000'
                        }
                    },
                    shadowSize: 0,
                    colors: data.colors,
                    legend: {
                        labelFormatter: function(label, series){
                            var id = '#inlineCheckbox' + label;
                            var color = series.color;
                            $(id).css('background-color', color);
                            $(id).css('border-color', color);
                        }
                    }
                };

                if (unit == 0) {
                    $('#line-flotchart' + data.id).plot(lineData, lineOptions);
                } else {
                    $('#line-flotchart').plot(lineData, lineOptions);
                }
            });

        }

    }
})();


(function() {
    'use strict';

    $(formAdvanced);

    function formAdvanced() {

        if ( !$.fn.datepicker || !$.fn.select2 ) return;

        $('#example-datepicker-5').datepicker({
            container:'#example-datepicker-container-5',
            autoclose: true
        });

        $('#select2-3').select2();
    }

})();