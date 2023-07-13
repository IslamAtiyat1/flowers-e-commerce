<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>document</title>
    <style>
        main .insights {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.6rem;
        }

        main .insights>div {
            background: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            box-shadow: var(--box-shadow);
            transition: all 300ms ease;
        }

        main .insights>div:hover {
            box-shadow: none;
        }

        main .insights>div span {
            background: var(--color-primary);
            padding: 0.5rem;
            border-radius: 50%;
            color: var(--color-white);
            font-size: 2rem;
        }

        main .insights>div.expenses span {
            background: var(--color-danger);
        }

        main .insights>div.income span {
            background: var(--color-success);
        }

        main .insights>div .middle {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        main .insights h3 {
            margin: 1rem 0 0.6rem;
            font-size: 1rem;
            color: var(--color-dark);
        }

        main .insights .progress {
            position: relative;
            width: 92px;
            height: 92px;
            border-radius: 50%;
        }

        main .insights svg {
            width: 7rem;
            height: 7rem;
        }

        main .insights svg circle {
            fill: none;
            stroke: var(--color-primary);
            stroke-width: 14;
            stroke-linecap: round;
            transform: translate(5px, 5px);
            stroke-dasharray: 110;
            stroke-dashoffset: 92;
        }

        main .insights .sales svg circle {
            stroke-dashoffset: -30;
            stroke-dasharray: 200;
        }

        main .insights .expenses svg circle {
            stroke-dashoffset: 20;
            stroke-dasharray: 80;
        }

        main .insights .income svg circle {
            stroke-dashoffset: 35;
            stroke-dasharray: 110;
        }

        main .insights .progress .number {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main .insights small {
            margin-top: 1.6rem;
            display: block;
        }
    </style>
</head>

<body>
    <h1></h1>

    <!--  -->
    <div class="admin_profile">
        <div class="info">
            <p>Hey, <b> Negin</b></p>
            <small class="text-muted"> Admin</small>

        </div>
        <div class="admin_email">
            <small class="text-muted">Email</small>
            <p>islamatiyat15@gmail.com</p>


        </div>
        <div class="admin_email">
            <small class="text-muted">Email</small>
            <p>islamatiyat15@gmail.com</p>


        </div>
        <div class="admin_email">
            <small class="text-muted">Email</small>
            <p>islamatiyat15@gmail.com</p>


        </div>
    </div>


</body>