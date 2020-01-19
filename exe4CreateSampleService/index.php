<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <title>Hello, world!</title>
    <script>
        function submit() {
            var input = $("#input").val();
            if (input !== "") {
                $.post("server.php", {data: input}, function(data, status){
                    if (status === "success") {
                        data = JSON.parse(data);
                        $("#result").html(data.data);
                    }
                });
            }
        }
    </script>
  </head>
<body>
	<input type="datetime-local" id="input">
        <button onclick="submit()">Submit</button>
    <br>
    <div id="result"></div>
</body>
</html>