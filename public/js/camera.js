 (function(){
    'use strict'

    let mediaStream = null,
        webcamList = [],
        currentCam = null,
        photoReady = false;

    // Css filters
    let index = 0,
        filters = ['grayscale', 'sepia', 'blur', 'invert', 'brightness', 'contrast', ''];

    const VIDEO_TAG_ID = 'videoTag';
    const SWITCH_ID = 'switch';
    const CANVAS_TAG_ID = 'canvasTag';
    const SAVE_IMAGE_ID = 'saveImg';

    const initalizeVideoStream = function(stream) {
        mediaStream = stream;

        const video = document.getElementById(VIDEO_TAG_ID)
        if(typeof (video.srcObject) !== 'undefined') {
            video.srcObject = mediaStream
        } else {
            video.src = URL.createObjectURL(mediaStream)
        }

        webcamList.length > 1 && (document.getElementById(SWITCH_ID).disabled = false);
    };


    const savePhoto = function() {
        if(photoReady) {
            var canvas = document.getElementById(CANVAS_TAG_ID);

            if(navigator.msSaveBlob) {
                var imgData = canvas.msToBlob('image/jpeg')
                navigator.msSaveBlob(imgData, 'myPhoto.jpg')
            } else {
                var imgData = canvas.toDataURL('image/jpeg')
                var link = document.getElementById(SAVE_IMAGE_ID)
                link.href = imgData
                link.download = 'myPhoto.jpg'
                link.click()
            }

            canvas.removeEventListener('click', savePhoto)
            document.getElementById('photoViewText').innerHTML = ''
            photoReady = false
        }
    };

    var capture = function() {
        if(!mediaStream)
            return

        var video = document.getElementById(VIDEO_TAG_ID)
        var canvas = document.getElementById(CANVAS_TAG_ID)
        canvas.removeEventListener('click', savePhoto)
        const videoWidth = video.videoWidth
        const videoHeight = video.videoHeight

        if(canvas.width !== videoWidth || canvas.height !== videoHeight) {
            canvas.width = videoWidth
            canvas.height = videoHeight
        }

        const ctx = canvas.getContext('2d')
        ctx.drawImage(video, 0, 0, videoWidth, videoHeight)
        photoReady = true
        document.getElementById('photoViewText').innerHTML = 'Click or tap below to save as .jpg'
        canvas.addEventListener('click', savePhoto)
    }

    /**
     * Used to rotate the webcam device list
     * - Release the current webcam (if there is one in use)
     * - Call getUserMedia() to access the next webcam
     */
    var nextWebcam = function() {
        document.getElementById('switch').disabled = true
        if(currentCam !== null) {
            currentCam ++
            if(currentCam >= webcamList.length) {
                currentCam = 0
            }
            var video = document.getElementById(VIDEO_TAG_ID)
            video.srcObject = null;
            video.src = null;
            if(mediaStream) {
                var videoTrack = mediaStream.getVideoTracks()
                videoTrack[0].stop()
                mediaStream = null
            }
        } else {
            currentCam = 0
        }

        navigator.mediaDevices.getUserMedia({
            video: {
                width: 200,
                height: 220,
                deviceId: {exact: webcamList[currentCam]}
            }
        }).then(initalizeVideoStream).catch(getUserMediaError)
    }

    /**
     * handle devicechange event
     */
    var deviceChanged = function() {
        navigator.mediaDevices.removeEventListener('devicechange', deviceChanged);

        webcamList = []
        
        navigator.mediaDevices.enumerateDevices().then(devicesCallback)
    }

    /**
     * callback function for device enumeration
     */
    var devicesCallback = function(devices) {
        // identify all webcams
        for(let i = 0; i < devices.length; i++) {
            if(devices[i].kind == 'videoinput') {
                webcamList[webcamList.length] = devices[i].deviceId
            }
        }
        if(webcamList.length > 0) {
            // start video with the first device on the list
            nextWebcam()

            document.getElementById(SWITCH_ID).disabled = webcamList.length == 1
        } else {
            writeError('webcam not found')
        }
    }

    // writeError(string) - Provides a way to display errors to the user
    var writeError = function (string) {
        var elem = document.getElementById('error');
        var p    = document.createElement('div');
        p.appendChild(document.createTextNode('ERROR: ' + string));
        elem && elem.appendChild(p);
    };

    // getUserMediaError() - Callback function when getUserMedia() returns error
    // 1. Show the error message with the error.name
    var getUserMediaError = function (e) {
        if (e.name.indexOf('NotFoundError') >= 0) {
            writeError('Webcam not found.');
        }
        else {
            writeError('The following error occurred: "' + e.name + '" Please check your webcam device(s) and try again.');
        }
    };

    // var changeCssFilterOnVid = function() {
    //     var el = document.getElementById(VIDEO_TAG_ID)
    //     el.className = 'view--video__video'

    //     var effect = filters[index++ % filters.length]
    //     if(effect) {
    //         el.classList.add(effect)
    //     }
    // }

    // var changeCssFilterOnImg = function() {
    //     var el = document.getElementById(CANVAS_TAG_ID)
    //     el.className = 'view--snapshot__canvas'

    //     var effect = filters[index++ % filters.length]
    //     if(effect) {
    //         el.classList.add(effect)
    //     }
    // }

    /**
     * The entry point to demo code
     * - Detect whether getUserMedia() is supported, show an error if not
     * - Set up neccessary event listeners for video tag and the webcam 'switch' button
     * - Detect whether device enumeration is supported, use the legacy media capture API to start the demo legacy
     * - Enumerate the webcam devices when the browser supports device enumeration
     */
    const init = function() {
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

        document.getElementById('frame-capture').addEventListener('click', capture, false);
        document.getElementById(SWITCH_ID).addEventListener('click', nextWebcam, false);
        // document.getElementById('change-vid-filters').addEventListener('click', changeCssFilterOnVid, false);
        // document.getElementById('change-img-filters').addEventListener('click', changeCssFilterOnImg, false);
        
        if(navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
            navigator.mediaDevices.enumerateDevices().then(devicesCallback)
        } else if (navigator.getUserMedia) {
            document.getElementById('tooltip').innerHTML = 'Cannot switch web cams because navigator.mediaDevices.enumerateDevices is unsupported by your browser.';
            
            navigator.getUserMedia({video: true}, initalizeVideoStream, getUserMediaError)
            console.log(123)
        } else {
            console.error('You are using browser that does not support Media Capture API')
        }
    }

    init()
})()