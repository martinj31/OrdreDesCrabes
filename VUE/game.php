<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Ninja Slayer</title>
    <link rel="shortcut icon" href="TemplateData/favicon.ico">
    <link rel="stylesheet" href="TemplateData/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/index.css">
</head>

<body>

<?php

require_once('TEMPLATE/Header.php');
?>

<br><br><br>
    <div id="unity-container" class="unity-desktop">
        <canvas id="unity-canvas"></canvas>
        <div id="unity-loading-bar">
            <div id="unity-logo"></div>
            <div id="unity-progress-bar-empty">
                <div id="unity-progress-bar-full"></div>
            </div>
        </div>
        <div id="unity-mobile-warning">
            WebGL builds are not supported on mobile devices.
        </div>
        <div id="unity-footer">
            <div id="unity-webgl-logo"></div>
            <div id="unity-fullscreen-button"></div>
            <div id="unity-build-title">Ninja Slayer</div>
        </div>
    </div>
    <script>
        var buildUrl = "../GAME/NinjaSlayer/Build";
    var loaderUrl = buildUrl + "/webGL test 2 dev.loader.js";
        var config = {
            dataUrl: buildUrl + "/webGL test 2 dev.data",
            frameworkUrl: buildUrl + "/webGL test 2 dev.framework.js",
            codeUrl: buildUrl + "/webGL test 2 dev.wasm",
            streamingAssetsUrl: "StreamingAssets",
            companyName: "MartyGame",
            productName: "Ninja Slayer",
            productVersion: "1",
        };

        var container = document.querySelector("#unity-container");
        var canvas = document.querySelector("#unity-canvas");
        var loadingBar = document.querySelector("#unity-loading-bar");
        var progressBarFull = document.querySelector("#unity-progress-bar-full");
        var fullscreenButton = document.querySelector("#unity-fullscreen-button");
        var mobileWarning = document.querySelector("#unity-mobile-warning");

        if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
            container.className = "unity-mobile";
            config.devicePixelRatio = 1;
            mobileWarning.style.display = "block";
            setTimeout(() => {
                mobileWarning.style.display = "none";
            }, 5000);
        } else {
            canvas.style.width = "960px";
            canvas.style.height = "600px";
        }
        loadingBar.style.display = "block";

        var script = document.createElement("script");
        script.src = loaderUrl;
        script.onload = () => {
            createUnityInstance(canvas, config, (progress) => {
                progressBarFull.style.width = 100 * progress + "%";
            }).then((unityInstance) => {
                loadingBar.style.display = "none";
                fullscreenButton.onclick = () => {
                    unityInstance.SetFullscreen(1);
                };
            }).catch((message) => {
                alert(message);
            });
        };
        document.body.appendChild(script);
    </script>
</body>

</html>