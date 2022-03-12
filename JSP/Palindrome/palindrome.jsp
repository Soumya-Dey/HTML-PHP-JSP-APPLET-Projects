<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

         body{
            background: #f5f5f5;
            height: 100vh;
            padding: 6em 6em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .container{
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1em 4.5em;
            border-radius: 6px;
            height: 200px;
            background-color: #fff;
            border: 1px solid #969696;
            box-shadow: -4px 4px 0 0 #969696, -8px 8px 0 0 #969696;
        }

        b{
            font-size: 2em;
        }

        span{
            color: darkcyan;
        }

        .btn-back{
            margin-top: 2em;
            font-size: 0.9em;
            font-weight: 600;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid #202020;
            background-color: transparent;
            color: #202020;
            transition: all 0.3s ease-in-out;
        }

        .btn-back:hover{
            background-color: #202020;
            color: #fff;
            border-radius: 34px;
        }
    </style>
</head>
<body>
    <%!
        String isPalindrome(String str){
            int i = 0;
            int j = str.length() - 1;
    
            while (i < j) {
                if (str.charAt(i) != str.charAt(j))
                    return "not a Palindrome";
    
                i++;
                j--;
            }

            return "a Palindrome";
        }
    %>

    <div class="container">
        <b> <span>"<%= request.getParameter("str") %>"</span> is <%= isPalindrome(request.getParameter("str")) %> </b>
        <a class="btn-back" href="/JSP Programs/Palindrome">Go Back</a>
    </div>
</body>
</html>