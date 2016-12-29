<hr/>
<div id="copyright text-right">&copy; Copyright <?php echo Date('Y'); ?> - CK Game.</div>

<!--check delete-->
<script>
	function checkDel()
	{
		return confirm("Are you want delete?");
	}

    function checkPay()
    {
        return confirm("Are you want pay to customer?");
    }
</script>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>

