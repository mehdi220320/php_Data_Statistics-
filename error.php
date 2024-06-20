<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Bouncer</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway");
        :root {
            --glow-color: #cf352c;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        body {
            justify-content: center;
            align-items: center;
        }
        .glowing-btn {
            position: relative;
            color: var(--glow-color);
            cursor: pointer;
            padding: 0.35em 1em;
            border: 0.15em solid var(--glow-color);
            border-radius: 0.45em;
            background: none;
            font-family: "Raleway", sans-serif;
            font-size: 2em;
            font-weight: 900;
            -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
            -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
            box-shadow: inset 0px 0px 0.5em 0px var(--glow-color), 0px 0px 0.5em 0px var(--glow-color);
            animation: border-flicker 2s linear infinite;
        }
        .glowing-txt {
            float: left;
            margin-right: -0.8em;
            -webkit-text-shadow: 0 0 0.125em #000, 0 0 0.45em var(--glow-color);
            -moz-text-shadow: 0 0 0.125em #000, 0 0 0.45em var(--glow-color);
            text-shadow: 0 0 0.125em #000, 0 0 0.45em var(--glow-color);
            animation: text-flicker 3s linear infinite;
        }
        .faulty-letter {
            opacity: 0.5;
            animation: faulty-flicker 2s linear infinite;
        }
        .glowing-btn::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.7;
            filter: blur(1em);
            transform: translateY(120%) rotateX(95deg) scale(1, 0.35);
            pointer-events: none;
        }
        .glowing-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            z-index: -1;
            background-color: var(--glow-color);
            box-shadow: 0 0 2em 0.2em var(--glow-color);
            transition: opacity 100ms linear;
        }
        .glowing-btn:hover {
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            animation: none;
        }
        .glowing-btn:hover .glowing-txt {
            animation: none;
        }
        .glowing-btn:hover .faulty-letter {
            animation: none;
            text-shadow: none;
            opacity: 1;
        }
        .glowing-btn:hover:before {
            filter: blur(1.5em);
            opacity: 1;
        }
        .glowing-btn:hover:after {
            opacity: 1;
        }
        @keyframes faulty-flicker {
            0% {
                opacity: 0.1;
            }
            2% {
                opacity: 0.1;
            }
            4% {
                opacity: 0.5;
            }
            19% {
                opacity: 0.5;
            }
            21% {
                opacity: 0.1;
            }
            23% {
                opacity: 1;
            }
            80% {
                opacity: 0.5;
            }
            83% {
                opacity: 0.4;
            }
            87% {
                opacity: 1;
            }
        }
        @keyframes text-flicker {
            0% {
                opacity: 0.1;
            }
            2% {
                opacity: 1;
            }
            8% {
                opacity: 0.1;
            }
            9% {
                opacity: 1;
            }
            12% {
                opacity: 0.1;
            }
            20% {
                opacity: 1;
            }
            25% {
                opacity: 0.3;
            }
            30% {
                opacity: 1;
            }
            70% {
                opacity: 0.7;
            }
            72% {
                opacity: 0.2;
            }
            77% {
                opacity: 0.9;
            }
            100% {
                opacity: 0.9;
            }
        }
        @keyframes border-flicker {
            0% {
                opacity: 0.1;
            }
            2% {
                opacity: 1;
            }
            4% {
                opacity: 0.1;
            }
            8% {
                opacity: 1;
            }
            70% {
                opacity: 0.7;
            }
            100% {
                opacity: 1;
            }
        }
        @media only screen and (max-width: 600px) {
            .glowing-btn {
                font-size: 1em;
            }
        }

        :root {
            --red: #cf352c;
            --dark-red: #9c0502;
            --light-beige: #f3f2ee;
            --beige: #eee8e0;
            --dark-beige: #dad2c9;
            --black: #1d2528;
            --gray: #38434a;
            --lighter-gray: #49555b;
            --white: #fff;
            --bouncer-skin: #ffb482;
            --pole: #f5ae4e;
            --pole-shadow: #df9d41;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Limelight", cursive;
            color: var(--gray);
        }

        .background {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            &::before {
                display: block;
                content: "";
                position: absolute;
                top: -100px;
                left: 50%;
                transform: translateX(-50%);
                width: 450px;
                height: 450px;
                background: var(--beige);
                border-radius: 50%;
                z-index: -1;
            }
            &::after {
                display: block;
                content: "";
                position: absolute;
                top: -150px;
                left: 50%;
                transform: translateX(-50%);
                width: 550px;
                height: 550px;
                background: var(--light-beige);
                border-radius: 50%;
                z-index: -2;
            }
        }

        .door {
            position: relative;
            width: 180px;
            height: 300px;
            margin: 0 auto -10px;
            background: var(--light-beige);
            border: 10px solid var(--dark-beige);
            border-radius: 3px;
            font-size: 50px;
            line-height: 3;
            text-align: center;
            text-shadow: 0 2px var(--pole);
            &::before {
                display: block;
                content: "";
                position: absolute;
                top: 140px;
                right: 10px;
                width: 25px;
                height: 25px;
                background: var(--black);
                border-radius: 50%;
            }
            &::after {
                display: block;
                content: "";
                position: absolute;
                top: 148px;
                right: 18px;
                width: 35px;
                height: 10px;
                background: var(--lighter-gray);
                border-radius: 5px;
            }
        }

        .rug {
            width: 180px;
            border-bottom: 120px solid var(--red);
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            &::before {
                display: block;
                content: "";
                position: relative;
                width: 100%;
                height: 10px;
                background: var(--dark-red);
            }
        }

        .foreground {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
        }

        .bouncer {
            position: relative;
            left: -130px;
            transition: left 1.5s;
            .head {
                position: relative;
                left: 10px;
                margin-bottom: 10px;
                width: 65px;
                height: 90px;
                background: var(--bouncer-skin);
                border-radius: 15px;
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;
                &::before {
                    display: block;
                    content: "";
                    position: absolute;
                    right: 0;
                    bottom: 0;
                    width: 55px;
                    height: 40px;
                    background: rgba(0, 0, 0, 0.1);
                    border-radius: 10px;
                    border-top-left-radius: 30px;
                    border-bottom-right-radius: 15px;
                    z-index: 10;
                }
                .neck {
                    position: absolute;
                    bottom: -15px;
                    width: 48px;
                    height: 30px;
                    background: var(--bouncer-skin);
                    z-index: 5;
                    &::before {
                        display: block;
                        content: "";
                        position: absolute;
                        top: 15px;
                        right: 0;
                        width: 0px;
                        height: 0px;
                        border-left: 15px solid transparent;
                        border-right: 15px solid rgba(0, 0, 0, 0.3);
                        border-top: 2px solid rgba(0, 0, 0, 0.3);
                        border-bottom: 2px solid transparent;
                    }
                }
                .eye {
                    position: absolute;
                    top: 40px;
                    width: 5px;
                    height: 5px;
                    background: var(--black);
                    border-radius: 50%;
                    &.left {
                        right: 5px;
                    }
                    &.right {
                        right: 30px;
                    }
                    &::before {
                        display: block;
                        content: "";
                        position: relative;
                        bottom: 8px;
                        right: 5px;
                        width: 15px;
                        height: 5px;
                        background: rgba(0, 0, 0, 0.3);
                        border-radius: 5px;
                        transition: bottom 0.5s;
                    }
                }
                .ear {
                    position: relative;
                    top: 40px;
                    left: -10px;
                    width: 20px;
                    height: 20px;
                    background: var(--bouncer-skin);
                    border-radius: 50%;
                    &::before {
                        display: block;
                        content: "";
                        position: relative;
                        top: 5px;
                        left: 5px;
                        width: 10px;
                        height: 10px;
                        background: var(--white);
                        border-radius: 50%;
                    }
                    &::after {
                        display: block;
                        content: "";
                        position: relative;
                        top: -3px;
                        left: 10px;
                        width: 10px;
                        height: 55px;
                        border-top: 3px solid transparent;
                        border-left: 2px solid var(--white);
                        border-bottom: 3px solid transparent;
                        border-radius: 50%;
                        transform: rotate(-10deg);
                        z-index: 10;
                    }
                }
            }
            .body {
                position: relative;
                width: 110px;
                height: 270px;
                background: var(--black);
                border-top-right-radius: 45px;
                border-top-left-radius: 15px;
                &::before {
                    display: block;
                    content: "";
                    position: relative;
                    top: 5px;
                    width: 104px;
                    height: 110px;
                    background: var(--white);
                    border-top-right-radius: 42px;
                }
                &::after {
                    display: block;
                    content: "";
                    position: absolute;
                    top: 0;
                    width: 75px;
                    height: 180px;
                    background: var(--gray);
                    border-top-right-radius: 42px;
                    border-top-left-radius: 15px;
                    border-bottom-right-radius: 100px;
                    border-bottom-left-radius: 10px;
                    z-index: 15;
                }
            }
            .arm {
                position: absolute;
                top: 105px;
                left: -20px;
                width: 60px;
                height: 230px;
                background: var(--lighter-gray);
                border-radius: 30px;
                box-shadow: -1px 0px var(--black);
                transform: rotate(-30deg);
                transform-origin: top center;
                z-index: 20;
                transition: transform 1s;
                &::before {
                    display: block;
                    content: "";
                    position: absolute;
                    bottom: 0;
                    width: 60px;
                    height: 60px;
                    background: var(--bouncer-skin);
                    border-radius: 50%;
                }
            }
        }

        .poles {
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-25%);
            .pole {
                position: absolute;
                bottom: 0;
                width: 15px;
                height: 135px;
                background: var(--pole);
                &.left {
                    left: 200px;
                }
                &.right {
                    right: 200px;
                }
                &::before {
                    display: block;
                    content: "";
                    position: absolute;
                    top: -10px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 25px;
                    height: 25px;
                    background: var(--pole);
                    border-radius: 50%;
                    box-shadow: inset 0 -2px var(--pole-shadow);
                }
                &::after {
                    display: block;
                    content: "";
                    position: absolute;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 25px;
                    height: 4px;
                    background: var(--pole);
                    border-radius: 4px;
                    box-shadow: 0 2px var(--pole-shadow);
                }
            }
            .rope {
                position: absolute;
                top: -110px;
                left: -218px;
                width: 150px;
                height: 75px;
                border: 20px solid var(--red);
                border-top: 0;
                border-bottom-left-radius: 150px;
                border-bottom-right-radius: 150px;
                box-shadow: 0 2px var(--dark-red);
                box-sizing: border-box;
                transition: width 1.5s;
            }
        }

        .hover:hover {
            .bouncer {
                left: 130px;
            }
            .arm {
                transform: rotate(-42deg);
            }
            .rope {
                width: 435px;
            }
            .eye::before {
                bottom: 4px;
            }
        }

        button {
            --borderWidth: 5;
            --boxShadowDepth: 8;
            --buttonColor: #f00;
            --fontSize: 3;
            --horizontalPadding: 16;
            --verticalPadding: 8;
            background: transparent;
            border: calc(var(--borderWidth) * 1px) solid var(--buttonColor);
            box-shadow: calc(var(--boxShadowDepth) * 1px) calc(var(--boxShadowDepth) * 1px) 0 #888;
            color: var(--buttonColor);
            cursor: pointer;
            font-size: calc(var(--fontSize) * 1rem);
            font-weight: bold;
            outline: transparent;
            padding: calc(var(--verticalPadding) * 1px) calc(var(--horizontalPadding) * 1px);
            position: relative;
            transition: box-shadow 0.15s ease;
        }
        button:hover {
            box-shadow: calc(var(--boxShadowDepth) / 2 * 1px) calc(var(--boxShadowDepth) / 2 * 1px) 0 #888;
        }
        button:active {
            box-shadow: 0 0 0 #888;
        }
        button span {
            -webkit-clip-path: var(--clip);
            bottom: calc(var(--borderWidth) * -1px);
            clip-path: var(--clip);
            left: calc(var(--borderWidth) * -1px);
            position: absolute;
            right: calc(var(--borderWidth) * -1px);
            top: calc(var(--borderWidth) * -1px);
            z-index: 1;
        }
        button span:nth-of-type(1):hover,
        button span:nth-of-type(2):hover,
        button span:nth-of-type(3):hover,
        button span:nth-of-type(4):hover {
            --clip: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            z-index: 2;
        }
        button span:nth-of-type(1):hover ~ b:nth-of-type(1),
        button span:nth-of-type(2):hover ~ b:nth-of-type(2),
        button span:nth-of-type(3):hover ~ b:nth-of-type(3),
        button span:nth-of-type(4):hover ~ b:nth-of-type(4) {
            --clip: inset(0 0 0 0);
        }
        button span:nth-of-type(1) {
            --clip: polygon(0 0, 100% 0, 50% 50%, 50% 50%);
        }
        button span:nth-of-type(2) {
            --clip: polygon(100% 0, 100% 100%, 50% 50%);
        }
        button span:nth-of-type(3) {
            --clip: polygon(0 100%, 100% 100%, 50% 50%);
        }
        button span:nth-of-type(4) {
            --clip: polygon(0 0, 0 100%, 50% 50%);
        }
        button b {
            -webkit-clip-path: var(--clip);
            background: var(--buttonColor);
            border: calc(var(--borderWidth) * 1px) solid var(--buttonColor);
            bottom: calc(var(--borderWidth) * -1px);
            font-weight: bold;
            clip-path: var(--clip);
            color: var(--bg, #fafafa);
            left: calc(var(--borderWidth) * -1px);
            padding: calc(var(--verticalPadding) * 1px) calc(var(--horizontalPadding) * 1px);
            position: absolute;
            right: calc(var(--borderWidth) * -1px);
            top: calc(var(--borderWidth) * -1px);
            transition: -webkit-clip-path 0.25s ease;
            transition: clip-path 0.25s ease;
            transition: clip-path 0.25s ease, -webkit-clip-path 0.25s ease;
        }
        button b:nth-of-type(1) {
            --clip: inset(0 0 100% 0);
        }
        button b:nth-of-type(2) {
            --clip: inset(0 0 0 100%);
        }
        button b:nth-of-type(3) {
            --clip: inset(100% 0 0 0);
        }
        button b:nth-of-type(4) {
            --clip: inset(0 100% 0 0);
        }

    </style>
</head>

<body>
<button role="button" tabindex="0" style="margin-left: 36%; margin-top: 4%; --buttonColor: #FF0033;"><a href="logout.php" style="color: #FF0033;">Press to go Back!<span></span><span></span><span></span><span></span><b aria-hidden="true">Boo!</b><b aria-hidden="true">Boo!</b><b aria-hidden="true">Boo!</b><b aria-hidden="true">Boo!</b></a></button>
<div class='hover'>
    <div class='background'>
        <div class='door'>403</div>
        <div class='rug'></div>
    </div>
    <div class='foreground'>
        <div class='bouncer'>
            <div class='head'>
                <div class='neck'></div>
                <div class='eye left'></div>
                <div class='eye right'></div>
                <div class='ear'></div>
            </div>
            <div class='body'></div>
            <div class='arm'></div>
        </div>
        <div class='poles'>
            <div class='pole left'></div>
            <div class='pole right'></div>
            <div class='rope'></div>
        </div>
    </div>
</div>
</body>

</html>
