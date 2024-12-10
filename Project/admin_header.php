<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        body{
            min-height: 100vh;
            width: 100%;
            background-color:  #318CE7;
        }
        /* .mn{
            min-height: 100vh;
            width: 100%;
            background-color: #417ec8;
        } */
         nav{
            width: 100%;
            background-color: #13274F;
            
        }
        nav ul{
            list-style: none;
            display: flex;
            justify-content: flex-end;
            height: 60px;
            align-items: center;
            margin-right: 1%;
        }
        nav ul .logo{
            margin-right: auto;
            margin-left: 3%;
            width: 8%;
            display: flex;
            justify-content: flex-end;
        }
        .logo p{
            font-size: 25px;
            border: 2px solid;
            color: rgb(137, 178, 213);
        }
        nav .onDesk li:nth-child(2) a, nav ul li:nth-child(3) a, nav ul li:nth-child(4) a{
            padding: 10px;
            text-decoration: none;
            border-radius: 3px;
            color: rgb(149, 143, 137);
        }
        nav .onDesk li:nth-child(2) a:hover, nav ul li:nth-child(3) a:hover, nav ul li:nth-child(4) a:hover{
            color: rgb(119, 165, 229);
        }
        nav ul li:nth-child(5){
            margin-inline: 2%;
        }
        nav ul li:nth-child(5) input[type=search]{
            height: 35px;
            width: 250px;
            border-radius: 8px;
            border: none;
            background-color: rgb(170, 211, 211);
            color: darkblue;
        }
        input[type=search]:focus{
            outline: none;
            border: none;
        }
        nav ul li:nth-child(5) button{
            border: none;
        }
        .accountOption{
            margin-right: 4%;
        }
        .accountOption i{
            padding: 8px;
            font-size: 20px;
            text-decoration: none;
            background-color: rgb(158, 234, 234);
            border-radius: 50px;
            background-color: rgb(168, 224, 205);
        }
        nav ul .accountOption i:hover{
            background-color: rgb(154, 192, 192);
            cursor: pointer;
        }
        nav ul li:last-child{
            display: none; 
            margin-right: 1%;
            height: 30px;
            width: 40px;
            border-radius: 8px;
        }
        nav ul li:last-child i{
            height: 100%;
            display: grid;
            place-items: center;
        }
        nav ul li:last-child:hover{
            background-color: rgb(71, 128, 178);
            cursor: pointer;
        }
        .accOption{
            position: fixed;
            display: none;
            right: 4%;
            top: 8%;
            background-color: bisque;
            z-index: 0;
        }
        .opt{
            list-style: none;
            display: flex;
            flex-direction: column;
            width: 100%;
            display: grid;
            place-items: center;
        }
        .opt .options{
            height: 45px;
            display: grid;
            place-items: center;
            width: 100%;
        }
        .opt .options:hover{
            background-color: beige;
        }
        .options button{
            height: 30px;
            width: 60px;
            border: none;
            outline: none;
            background-color: rgb(155, 212, 231);
            border-radius: 8px;
        }
        a{
            text-decoration: none;
        }
        .options button a{
            text-decoration: none;
        }
        .opt .OptION{
            width: 100%;
            height: 40px;
            border-bottom: 2px solid;
            display: grid;
            place-items: center;
        }
        .onmob{
            height: 100vh;
            width: 250px;
            top: 0;
            right: 0;
            position: fixed;
            display: none;
            flex-direction: column;
            justify-content: start;
            align-items: start  space-between;
            background-color: rgba(119, 145, 187, 0.522);
            backdrop-filter: blur(8px);
            z-index: 1;
        }
        .onmob .onM{
            clear: both;
            height: 40px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .onM:hover{
            background-color: beige;
        }
        .onmob li:first-child{
            height: 30px;
        }
        @media(max-width:800px){
            .onlyOnDesktop{
                display: none;
                transition: 1s;
            }
            nav ul li:nth-child(4), nav ul li:nth-child(6){
                margin-right: 2%;
                transition: 1s;
            }
            nav ul li:last-child{
                display: block;
            }
        }
        @media(max-width: 400px){
            .onDesk li:first-child p{
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
   
        
            <nav>
                <ul class="onmob">
                    <li onclick=hide()><i class="fa-solid fa-xmark"></i></li>
                    <li class="onM"><a href="#">Home</a></li>
                    <li class="onM"><a href="manager_register.php">Register Manager</a></li>
                    <li class="onM"><a href="#">Create Task</a></li>
                </ul>
                <ul class="onDesk">
                    <li class="logo"><p>Task Info</p></li>
                    <li class="onlyOnDesktop"><a href="#">Home</a></li>
                    <li class="onlyOnDesktop"><a href="manager_register.php" name="reg">Register Manager</a></li>
                    <li class="onlyOnDesktop"><a href="#">Create Task</a></li>
                    <li class="onlyOnDesktop"><input type="search" id="search" placeholder="  search"></li>
                    
                    <li class="accountOption"><i class="fa-solid fa-user"></i></li>
                    <li onclick=show()><i class="fa-solid fa-bars"></i></li>
                </ul>
            </nav>
       
            <script>
                function show() {
                    var x = document.querySelector('.onmob');
                    x.style.display = "flex";
                }
                function hide(){
                    var x = document.querySelector('.onmob');
                    x.style.display = "none";
                }
                $(document).ready(function(){
                    $('.accountOption').click(function(){
                        $('.accOption').toggle();
                    });
                });
            </script>
    
        
        
</body>
</html>