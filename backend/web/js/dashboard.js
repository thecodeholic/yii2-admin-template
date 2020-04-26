$(function () {
  initSparklines();
  initChartjs();
  initLobiList();
  initPage();

  function initLobiList() {
    $('#dashboard-todo-list').lobiList({
      sortable: false,
      controls: ['edit', 'styleChange'],
      lists: [
        {
          title: 'TODOs',
          defaultStyle: 'lobilist-info',
          items: [
            {
              title: 'Floor cool cinders',
              description: 'Thunder fulfilled travellers folly, wading, lake.',
              dueDate: '2015-01-31'
            },
            {
              title: 'Periods pride',
              description: 'Accepted was mollis',
              done: true
            },
            {
              title: 'Flags better burns pigeon',
              description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank treacherously darkling.',
            },
            {
              title: 'Accepted was mollis',
              description: 'Rowed cloven frolic thereby, vivamus pining gown intruding strangers prank treacherously darkling.',
              dueDate: '2015-02-02'
            },
            {
              title: 'Composed trays',
              description: 'Hoary rattle exulting suspendisse elit paradises craft wistful. Bayonets allures prefer traits wrongs flushed. Tent wily matched bold polite slab coinage celerities gales beams.',
            },
            {
              title: 'Chic leafy',
              checked: true
            }
          ]
        }
      ]
    });
  }

  function initSparklines() {
    //Call this method before calling .sparkline() plugin to activate default colors, bar widths and other options
    initSparklineDefaults();
    initResponsiveSparklines();
    $('.sparkline').sparkline('html', {
      enableTagOptions: true
    });
  }

  function initChartjs() {
    var options = {
      responsive: true
    };
    var COLOR1 = LobiAdmin.lightenColor(LobiAdmin.DEFAULT_COLOR, -15);
    var COLOR2 = LobiAdmin.lightenColor(LobiAdmin.DEFAULT_COLOR, 0);
    var COLOR3 = LobiAdmin.fadeOutColor(LobiAdmin.DEFAULT_COLOR, 20);
    var COLOR4 = LobiAdmin.fadeOutColor(LobiAdmin.DEFAULT_COLOR, 40);

    var FADEOUT_COLOR_FACTOR = 20;

    //Initialize line chart
    (function () {
      // Get the context of the canvas element we want to select
      var statisticData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: fillChartJsColors('line', [
          {
            label: "Income in USD",
            strokeColor: LobiAdmin.fadeOutColor(LobiAdmin.DEFAULT_COLOR, 20),
            data: [55, 50, 55, 49, 56, 48, 50, 46, 50, 44, 56, 52]
          },
          {
            label: "Income in EUR",
            strokeColor: LobiAdmin.fadeOutColor(LobiAdmin.DEFAULT_COLOR, 60),
            data: [51, 54, 58, 66, 61, 64, 62, 56, 67, 58, 56, 54]
          }
        ])
      };
      var canvas = $('#line-chart');
      var ctx = canvas[0].getContext("2d");
      var statistictsChart = new Chart(ctx).Line(statisticData, options);
      var legend = $(statistictsChart.generateLegend());
      canvas.parent().append(legend);

      //Update charts on panel size change
      $('#dashboard-statisticts-panel').on('onFullScreen.lobiPanel onSmallSize.lobiPanel resizeStop.lobiPanel onPin.lobiPanel onUnpin.lobiPanel dragged.lobiPanel', function (ev) {
        statistictsChart.destroy();
        statistictsChart = new Chart(statistictsChart.chart.ctx).Line(statisticData, options);
      });
    })();

    //------------------------------------------------------------------------------
    //          Initialize pie charts
    //------------------------------------------------------------------------------
    (function () {
      var data = [
        {
          value: 970,
          color: COLOR1,
          highlight: LobiAdmin.fadeOutColor(COLOR1, FADEOUT_COLOR_FACTOR),
          label: "Shoes"
        },
        {
          value: 505,
          color: COLOR2,
          highlight: LobiAdmin.fadeOutColor(COLOR2, FADEOUT_COLOR_FACTOR),
          label: "Caps"
        },
        {
          value: 400,
          color: COLOR3,
          highlight: LobiAdmin.fadeOutColor(COLOR3, FADEOUT_COLOR_FACTOR),
          label: "Jeans"
        },
        {
          value: 250,
          color: COLOR4,
          highlight: LobiAdmin.fadeOutColor(COLOR4, FADEOUT_COLOR_FACTOR),
          label: "Shirts"
        }
      ];
      var ctx = $('#dashbboard-clothing-sales')[0].getContext('2d');
      new Chart(ctx).Doughnut(data, {});
    })();
    //------------------------------------------------------------------------------
    (function () {
      var data = [
        {
          value: 370,
          color: COLOR4,
          highlight: LobiAdmin.fadeOutColor(COLOR4, FADEOUT_COLOR_FACTOR),
          label: "Mouse"
        },
        {
          value: 457,
          color: COLOR3,
          highlight: LobiAdmin.fadeOutColor(COLOR3, FADEOUT_COLOR_FACTOR),
          label: "HDD"
        },
        {
          value: 270,
          color: COLOR1,
          highlight: LobiAdmin.fadeOutColor(COLOR1, FADEOUT_COLOR_FACTOR),
          label: "Laptop"
        },
        {
          value: 89,
          color: COLOR2,
          highlight: LobiAdmin.fadeOutColor(COLOR2, FADEOUT_COLOR_FACTOR),
          label: "Webcam"
        }
      ];
      var ctx = $('#dashbboard-computing-sales')[0].getContext('2d');
      // For a pie chart
      new Chart(ctx).Doughnut(data, {});
    })();
    //------------------------------------------------------------------------------
    (function () {
      var data = [
        {
          value: 20,
          color: COLOR3,
          highlight: LobiAdmin.fadeOutColor(COLOR3, FADEOUT_COLOR_FACTOR),
          label: "Table"
        },
        {
          value: 20,
          color: COLOR1,
          highlight: LobiAdmin.fadeOutColor(COLOR1, FADEOUT_COLOR_FACTOR),
          label: "Chair"
        },
        {
          value: 8,
          color: COLOR4,
          highlight: LobiAdmin.fadeOutColor(COLOR4, FADEOUT_COLOR_FACTOR),
          label: "Desk"
        },
        {
          value: 9,
          color: COLOR2,
          highlight: LobiAdmin.fadeOutColor(COLOR2, FADEOUT_COLOR_FACTOR),
          label: "Sofa"
        }
      ];
      var ctx = $('#dashbboard-furniture-sales')[0].getContext('2d');
      // For a pie chart
      new Chart(ctx).Doughnut(data, {});
    })();
    //------------------------------------------------------------------------------
    (function () {
      var data = [
        {
          value: 23,
          color: COLOR4,
          highlight: LobiAdmin.fadeOutColor(COLOR4, FADEOUT_COLOR_FACTOR),
          label: "Spoon"
        },
        {
          value: 31,
          color: COLOR2,
          highlight: LobiAdmin.fadeOutColor(COLOR2, FADEOUT_COLOR_FACTOR),
          label: "Cup"
        },
        {
          value: 51,
          color: COLOR3,
          highlight: LobiAdmin.fadeOutColor(COLOR3, FADEOUT_COLOR_FACTOR),
          label: "Plate"
        },
        {
          value: 21,
          color: COLOR1,
          highlight: LobiAdmin.fadeOutColor(COLOR1, FADEOUT_COLOR_FACTOR),
          label: "Knife"
        }
      ];
      var ctx = $('#dashbboard-vessel-sales')[0].getContext('2d');
      // For a pie chart
      new Chart(ctx).Doughnut(data, {});
    })();
  }

  function initPage() {
    //Initialize lobipanels
    $('.panel:not(.panel-with-tabs)').lobiPanel({
      editTitle: false,
      reload: false,
      sortable: true
    });

    //Initialize FullCalendar
    (function () {
      $('#dashboard-events .panel-body').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2015-09-12',
        droppable: true,
        eventLimit: true,
        businessHours: true,
        eventRender: function (event, element, view) {
          if (event.description) {
            element.append('<span class="fc-description">' + event.description + '</span>');
          }
        },
        events: [
          {
            title: 'All Day Event',
            start: '2015-09-01'
          },
          {
            title: 'Long Event',
            start: '2015-09-07',
            end: '2015-09-10',
            className: 'bg-success border-transparent'

          },
          {
            id: 999,
            title: 'Repeating Event',
            start: '2015-09-09T16:00:00',
            description: 'Repeating event description',
            className: 'bg-danger border-transparent'
          },
          {
            id: 999,
            title: 'Repeating Event',
            start: '2015-09-16T16:00:00',
            description: 'Repeating event description',
            className: 'bg-danger border-transparent'
          },
          {
            title: 'Conference',
            start: '2015-09-11',
            end: '2015-09-13',
            description: 'Description will held in hole',
            className: 'bg-purple border-transparent'
          },
          {
            title: 'Meeting',
            start: '2015-09-12T10:30:00',
            end: '2015-09-12T12:30:00',
            className: 'bg-info border-transparent'
          },
          {
            title: 'Lunch',
            start: '2015-09-12T12:00:00',
            description: 'The lunch will be at corner cafe'
          },
          {
            title: 'Meeting',
            start: '2015-09-12T14:30:00',
            className: 'bg-purple border-transparent'
          },
          {
            title: 'Happy Hour',
            start: '2015-09-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2015-09-12T20:00:00',
            className: 'bg-warning border-transparent'
          },
          {
            title: 'Birthday Party',
            start: '2015-09-13T07:00:00',
            className: 'bg-warning border-transparent'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2015-09-28'
          }
        ]
      });
      $('#dashboard-events').on('onFullScreen.lobiPanel onSmallSize.lobiPanel resizeStop.lobiPanel onPin.lobiPanel onUnpin.lobiPanel dragged.lobiPanel', function (ev, lobiPanel) {
        var cal = lobiPanel.$el.find('.panel-body');
        var ratio = cal.fullCalendar('option', 'aspectRatio');
        cal.fullCalendar('option', 'height', cal.find('.fc-view-container').outerWidth() / ratio);
      });
    })();
  }
});
