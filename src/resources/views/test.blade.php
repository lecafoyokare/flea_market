<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="message"></div>
    <form id="ajaxForm">
        <input type="text" name="name" id="name" placeholder="Enter name">
        <button type="submit">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#ajaxForm').on('submit', function(e) {
                e.preventDefault();  // フォームのデフォルト送信を防ぐ

                $.ajax({
                    type: 'POST',
                    url: '/yourMethod',
                    data: {
                        name: $('#name').val(),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#message').html('<p>' + response.message + '</p>');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);  // エラーメッセージを表示
                    }
                });
            });
        });
    </script>
</body>
</html>
