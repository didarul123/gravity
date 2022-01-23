    <!-- Optional JavaScript -->
    <!----- jquery 3.3.1  --->
    <script src="{{asset('public/admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!----- bootstap bundle js--->
    <script src="{{asset('public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!----- slimscroll js--->
    <script src="{{asset('public/admin/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!----- main js--->
    <script src="{{asset('public/admin/assets/libs/js/main-js.js')}}"></script>
    <!----- chart chartist js--->
    <script src="{{asset('public/admin/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/libs/js/dashboard-ecommerce.js')}}"></script>
    <!----- sparkline js--->
    <script src="{{asset('public/admin/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/charts/sparkline/spark-js.js')}}"></script>
    <!----- morris js--->
    <script src="{{asset('public/admin/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!----- chart c3 js--->
    <script src="{{asset('public/admin/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


    <script src="{{asset('public/admin/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('public/admin/assets/libs/js/chosen.jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
     <script src="{{asset('public/admin/assets/vendor/datatables/js/data-table.js')}}"></script>
    <script src="{{asset('public/admin/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
    <script src="{{asset('public/admin/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/admin/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('public/admin/cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js')}}"></script>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


</script>


<script>
    MathJax = {
      tex: {
        inlineMath: [['$', '$'], ['\\(', '\\)']]
      }
    };
</script>
<script>
    $('.datetime').datetimepicker({
        inline:true,
    });
</script>
<script>
    $('.datetime').datetimepicker({
        ownerDocument: document,
        contentWindow: window,

        value: '',
        rtl: false,

        format: 'Y/m/d H:i',
        formatTime: 'H:i',
        formatDate: 'Y/m/d',

        startDate:  false, // new Date(), '1986/12/08', '-1970/01/05','-1970/01/05',
        step: 60,
        monthChangeSpinner: true,

        closeOnDateSelect: false,
        closeOnTimeSelect: true,
        closeOnWithoutClick: true,
        closeOnInputClick: true,
        openOnFocus: true,

        timepicker: true,
        datepicker: true,
        weeks: false,

        defaultTime: false, // use formatTime format (ex. '10:00' for formatTime: 'H:i')
        defaultDate: false, // use formatDate format (ex new Date() or '1986/12/08' or '-1970/01/05' or '-1970/01/05')

        minDate: false,
        maxDate: false,
        minTime: false,
        maxTime: false,
        minDateTime: false,
        maxDateTime: false,

        allowTimes: [],
        opened: false,
        initTime: true,
        inline: false,
        theme: '',
        touchMovedThreshold: 5,

        onSelectDate: function () {},
        onSelectTime: function () {},
        onChangeMonth: function () {},
        onGetWeekOfYear: function () {},
        onChangeYear: function () {},
        onChangeDateTime: function () {},
        onShow: function () {},
        onClose: function () {},
        onGenerate: function () {},

        withoutCopyright: true,
        inverseButton: false,
        hours12: false,
        next: 'xdsoft_next',
        prev : 'xdsoft_prev',
        dayOfWeekStart: 0,
        parentID: 'body',
        timeHeightInTimePicker: 25,
        timepicker<a href="https://www.jqueryscript.net/tags.php?/Scroll/">Scroll</a>bar: true,
        todayButton: true,
        prevButton: true,
        nextButton: true,
        defaultSelect: true,

        scrollMonth: true,
        scrollTime: true,
        scrollInput: true,

        lazyInit: false,
        mask: false,
        validateOnBlur: true,
        allowBlank: true,
        yearStart: 1950,
        yearEnd: 2050,
        monthStart: 0,
        monthEnd: 11,
        style: '',
        id: '',
        fixed: false,
        roundTime: 'round', // ceil, floor
        className: '',
        weekends: [],
        highlightedDates: [],
        highlightedPeriods: [],
        allowDates : [],
        allowDateRe : null,
        disabledDates : [],
        disabledWeekDays: [],
        yearOffset: 0,
        beforeShowDay: null,

        enterLikeTab: true,
        showApplyButton: false
    });
</script>


