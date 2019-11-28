<style>
    div.validationErrorLogin {
        background-color: #eee;
        border: 1px solid red;
        margin: 5px;
        padding: 5px;
    }
    div.validationErrorLogin ol li {
        list-style-type: disc;
        margin-left: 20px;
    }
    div.validationErrorLogin {
        display: none
    }
    .validationErrorLogin label.error {
        display: inline;
    }
    .validationErrorLogin ol li .error{
        border: none;
    }
</style>
<div class="validationErrorLogin">
    
    <ol>
        <!--error message goes here-->
    </ol>
</div>


<script type="text/javascript">
    var container = $('div.validationErrorLogin');
</script>