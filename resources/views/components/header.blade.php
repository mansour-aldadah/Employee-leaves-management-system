@props(['title', 'page'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        /* Custom modal styles */
        #custom-modal2 {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content2 {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 25%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Custom input style */
        .aaa2 {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Button styles */
        .button-container2 {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .modal-button2 {
            margin: 0 10px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .save-button2 {
            background-color: #27ae60;
            color: white;
        }

        .close-button2 {
            background-color: #e74c3c;
            color: white;
        }
    </style>
    <title>{{ $title }}</title>
</head>

<body>
    <x-nav :page="$page" />
