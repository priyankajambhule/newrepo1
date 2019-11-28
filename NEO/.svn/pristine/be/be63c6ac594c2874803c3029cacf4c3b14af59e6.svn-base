$.validator.addMethod(
    "australianDate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
		if(value.trim()=='')
		{
			return true;
		}
		else
		{
        	return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
		}
    },
    "Please enter a valid date for ex: (25-10-1990)."
);