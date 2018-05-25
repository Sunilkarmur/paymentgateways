<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
    <title>Global Garner</title>
</head>
<body>
    <form method="post" name="redirect" action="{{ $endPoint }}">
        <input type=hidden name="merchantTxnId" value="{{ $parameters['merchantTxnId'] }}">
        <input type=hidden name="secSignature" value="{{ $hash }}">
        <input type=hidden name="orderAmount" value="{{ $parameters['orderAmount'] }}">
        <input type=hidden name="currency" value="{{ $parameters['currency'] }}">
        <input type=hidden name="returnUrl" value="{{ $parameters['returnUrl'] }}">
        <input type=hidden name="notifyUrl" value="{{ $parameters['notifyUrl'] }}">
    </form>

<script language='javascript'>document.redirect.submit();</script>

    {{--<script src="https://checkout-static.citruspay.com/lib/js/jquery.min.js"></script>--}}
    {{--<script id="context" type="text/javascript" src="https://sboxcheckout-static.citruspay.com/kiwi/app-js/icp.js"></script>--}}

{{--<script>--}}

    {{--var dataObj = {--}}
        {{--orderAmount: '{{ $parameters['orderAmount'] }}',--}}
        {{--currency: '{{ $parameters['currency'] }}',--}}
        {{--email: "someone@validemail.com",--}}
        {{--phoneNumber: "9234567890",--}}
        {{--merchantTxnId:'{{ $parameters['merchantTxnId'] }}',--}}
        {{--returnUrl: '{{ $parameters['returnUrl'] }}',--}}
        {{--vanityUrl:'{{ env("INDIPAY_CITRUS_VANITY_URL") }}',--}}
        {{--secSignature:'{{ $hash }}',--}}
        {{--firstName: "Rahul",--}}
        {{--lastName: "Seth",--}}
        {{--addressStreet1: "Connaught Place",--}}
        {{--addressStreet2: "Street Number 20",--}}
        {{--addressCity: "Delhi",--}}
        {{--addressState: "Delhi",--}}
        {{--addressCountry: "India",--}}
        {{--addressZip: "400605",--}}
        {{--notifyUrl: '{{ $parameters['notifyUrl'] }}',--}}
        {{--mode: "dropIn"--}}
    {{--};--}}

    {{--var configObj = {--}}
        {{--eventHandler: function(cbObj) {--}}
            {{--if (cbObj.event === 'icpLaunched') {--}}
                {{--console.log('Overlay is launched');--}}
                {{--// Place to understand when overlay is launched on your website--}}
            {{--} else if (cbObj.event === 'icpClosed') {--}}
                {{--$('#citrus_response').val(JSON.stringify(cbObj.message));--}}
                {{--$('#redirect').attr('action','{{ $parameters['returnUrl'] }}');--}}
                {{--post_to_url('{{ $parameters['returnUrl'] }}',cbObj.message,'post');--}}
{{--//                setTimeout(function () {--}}
{{--//                    document.redirect.submit();--}}
{{--//                },100);--}}

                {{--// Place to understand when overlay is closed on your website.--}}
                {{--// This might be closure of the overlay or completion of the order with successful payment.--}}
                {{--// Hence capturing message object is important to know exact status of the order--}}
                {{--console.log(JSON.stringify(cbObj.message));--}}
                {{--console.log('Overlay is closed');--}}
            {{--}--}}
        {{--}--}}
    {{--};--}}
    {{--window.citrusICP.launchIcp(dataObj, configObj);--}}

    {{--function post_to_url(path, params, method) {--}}
        {{--method = method || "post";--}}

        {{--var form = document.createElement("form");--}}

        {{--form._submit_function_ = form.submit;--}}

        {{--form.setAttribute("method", method);--}}
        {{--form.setAttribute("action", path);--}}

        {{--for(var key in params) {--}}
            {{--var hiddenField = document.createElement("input");--}}
            {{--hiddenField.setAttribute("type", "hidden");--}}
            {{--hiddenField.setAttribute("name", key);--}}
            {{--if(key=='customParameters'){--}}
                {{--hiddenField.setAttribute("value", JSON.stringify(params[key]));--}}
            {{--}else{--}}
                {{--hiddenField.setAttribute("value", params[key]);--}}
            {{--}--}}


            {{--form.appendChild(hiddenField);--}}
        {{--}--}}

        {{--document.body.appendChild(form);--}}
        {{--form._submit_function_();--}}
    {{--}--}}
{{--</script>--}}
</body>
</html>

