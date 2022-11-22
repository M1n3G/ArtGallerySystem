@extends('master')
@extends('forum/navbarInc')
@section('content')

<head>
    <script type="module">

        //Library
        import * as THREE from 'https://threejs.org/build/three.module.js';
        
        //Mouse moving
        import { OrbitControls } from 'https://threejs.org/examples/jsm/controls/OrbitControls.js';
        
        //GLTF extension
        import { GLTFLoader } from 'https://threejs.org/examples/jsm/loaders/GLTFLoader.js';
      
        //Objects
        let scene, renderer, camera;
        let model, skeleton, mixer, clock;
        let motion = { height:1.8, speed:0.2, turnSpeed:Math.PI*0.02 };
        let keymap={};
        let delta = 0.008; // seconds
        let moveDistance = 20 * delta; // 20 pixels per second
        let rotateAngle = Math.PI / 2 * delta; //pi.2 radians (90 degrees) per second
        let tTracker = false;
        let lTracker = false;
        let rTracker = false;
        let Tracker8 = false;
        let Tracker9 = false;
        let xTracker = false;
        let obj3, obj5;
        let sphereObject;

        const crossFadeControls = [];

        let currentBaseAction = 'idle';
        const allActions = [];
        const baseActions = {
            idle: { weight: 1},
            walk: { weight: 0},
            run: { weight: 0}
        };
        const additiveActions = {
            sneak_pose: { weight: 0},
            sad_pose: { weight: 0},
            agree: { weight: 0},
            headShake: { weight: 0}
        };
        let numAnimations;

        init();

        function init(){
            const container = document.getElementById( 'container' );
            clock = new THREE.Clock();

            scene = new THREE.Scene();
            scene.translateX(3.0).translateY(-0.09).translateZ(-2.5);
            scene.background= new THREE.Color( 0xa0a0a0 );
            scene.fog = new THREE.Fog( 0xa0a0a0, 10, 50 );

            const hemiLight = new THREE.HemisphereLight( 0x606060, 0x2a2a35 );
            hemiLight.position.set( 0, 1, 0 );
            scene.add( hemilight );

            //Texture
            const walle = new THREE.TextureLoader().load( "public/Img/Textures/wall.png" );
            walle.wrapS = THREE.RepeatWrapping;
            walle.wrapT = THREE.RepeatWrapping;
            walle.repeat.set( 4, 1.5);

            const texture2 = new THREE.TextureLoader().load( "public/Img/Textures/wall.png" );
            texture2.wrapS = THREE.RepeatWrapping;
            texture2.wrapT = THREE.RepeatWrapping;
            texture2.repeat.set( 4, 1);

            const texture3 = new THREE.TextureLoader().load( "public/Img/Textures/ceiling.png" );
            texture3.wrapS = THREE.RepeatWrapping;
            texture3.wrapT = THREE.RepeatWrapping;
            texture3.repeat.set( 32, 32);

            const texture4 = new THREE.TextureLoader().load( "public/Img/Textures/floor.jpg" );
            texture4.wrapS = THREE.RepeatWrapping;
            texture4.wrapT = THREE.RepeatWrapping;
            texture4.repeat.set( 32, 32);

            const texture5 = new THREE.TextureLoader().load( "public/Img/Artwork/art1.jpg" );
            const texture6 = new THREE.TextureLoader().load( "public/Img/Artwork/art2.jpg" );
            const texture7 = new THREE.TextureLoader().load( "public/ImgArtwork/art3.jpg" );
            const texture8 = new THREE.TextureLoader().load( "public/Img/Artwork/art4.jpg" );
            const texture9 = new THREE.TextureLoader().load( "public/Img/Artwork/art5.jpg" );
            const texture10 = new THREE.TextureLoader().load( "public/Img/Artwork/art6.jpg" );
            const texture11 = new THREE.TextureLoader().load( "public/Img/Artwork/art7.jpg" );
            const texture12 = new THREE.TextureLoader().load( "public/Img/Artwork/art8.jpg" );
            const texture13 = new THREE.TextureLoader().load( "public/Img/Artwork/art9.jpg" );

            // Floor
            const mesh = new THREE.Mesh( new THREE.PlaneGeometry( 8, 10, 20, 20 ), new THREE.MeshPhongMaterial( { map: texture4, side: THREE.DoubleSide } ) );
            mesh.rotation.x = - Math.PI / 2;
            mesh.receiveShadow = true;
            scene.add( mesh );

            // Ceiling
            const planeGeometry3 = new THREE.PlaneGeometry(8, 10, 20, 20);
            const planeMaterial3 = new THREE.MeshPhongMaterial({map: texture3, side: THREE.DoubleSide});
            const planeObject3 = new THREE.Mesh(planeGeometry3, planeMaterial3);
            scene.add(planeObject3);
            planeObject3.translateX(0.0).translateY(2.5).translateZ(0.0); 
            planeObject3.rotation.x = - Math.PI / 2;

            // Pictures
            const pic1 = new THREE.Mesh( new THREE.PlaneGeometry( 1, 2 ), new THREE.MeshPhongMaterial( { map:texture5, side: THREE.DoubleSide} ) );
            scene.add( pic1 );
            pic1.translateX(3.97).translateY(1.26).translateZ(2.0); 
            pic1.rotateOnAxis(new THREE.Vector3(0, 1, 0), Math.PI / 2);

            const pic2 = new THREE.Mesh( new THREE.PlaneGeometry( 4, 2 ), new THREE.MeshPhongMaterial( { map:texture6, side: THREE.DoubleSide} ) );
            scene.add( pic2 );
            pic2.translateX(1.6).translateY(1.26).translateZ(4.8); 
            pic2.rotation.y = Math.PI / 2;
            pic2.rotateOnAxis(new THREE.Vector3(0, 1, 0), Math.PI / 2);

            const pic3 = new THREE.Mesh( new THREE.PlaneGeometry( 4, 2 ), new THREE.MeshPhongMaterial( { map:texture7, side: THREE.DoubleSide} ) );
            scene.add( pic3 );
            pic3.translateX(-3.95).translateY(1.26).translateZ(-0.2); 
            // pic3.rotation.z = Math.PI / 2;
            pic3.rotateOnAxis(new THREE.Vector3(0, 1, 0), Math.PI / 2);

            const pic4 = new THREE.Mesh( new THREE.PlaneGeometry( 1.8, 1.8 ), new THREE.MeshPhongMaterial( { map:texture9, side: THREE.DoubleSide} ) );
            scene.add( pic4 );
            pic4.translateX(-2.05).translateY(1.26).translateZ(-0.55); 
            pic4.rotateOnAxis(new THREE.Vector3(0, 1, 0), Math.PI / 2);

            const pic5 = new THREE.Mesh( new THREE.PlaneGeometry( 1, 2 ), new THREE.MeshPhongMaterial( { map:texture8, side: THREE.DoubleSide} ) );
            scene.add( pic5 );
            pic5.translateX(-3.95).translateY(1.26).translateZ(3.5);
            pic5.rotation.x = Math.PI / 2;
            pic5.rotation.y = Math.PI / 2;
            pic5.rotateOnAxis(new THREE.Vector3(0, 0, -1), Math.PI / 2);

            const pic6 = new THREE.Mesh( new THREE.PlaneGeometry( 0.8, 0.8 ), new THREE.MeshPhongMaterial( { map:texture10, side: THREE.DoubleSide} ) );
            scene.add( pic6 );
            pic6.translateX(-4.5).translateY(1.26).translateZ(5.1);
            pic6.rotation.y = Math.PI / 2;
            pic6.rotateOnAxis(new THREE.Vector3(0, -1, 0), Math.PI / 2);

            const pic7 = new THREE.Mesh( new THREE.PlaneGeometry( 1.5, 1.5 ), new THREE.MeshPhongMaterial( { map:texture11, side: THREE.DoubleSide} ) );
            scene.add( pic7 );
            pic7.translateX(3.97).translateY(1.6).translateZ(-1.5);
            pic7.rotateOnAxis(new THREE.Vector3(0, -1, 0), Math.PI / 2);

            const pic8 = new THREE.Mesh( new THREE.PlaneGeometry( 0.8, 0.8 ), new THREE.MeshPhongMaterial( { map:texture12, side: THREE.DoubleSide} ) );
            scene.add( pic8 );
            pic8.translateX(-0.99).translateY(1.7).translateZ(4);
            pic8.rotateOnAxis(new THREE.Vector3(0, 1, 0), Math.PI / 2);

            const pic9 = new THREE.Mesh( new THREE.PlaneGeometry( 3,2 ), new THREE.MeshPhongMaterial( { map:texture13, side: THREE.DoubleSide} ) );
            scene.add( pic9 );
            pic9.translateX(0.0).translateY(1.26).translateZ(-3.85);
            //pic9.rotation.x = Math.PI / 2;
            pic9.rotation.y = Math.PI / 2;
            pic9.rotateOnAxis(new THREE.Vector3(0, -1, 0), Math.PI / 2);

            // Building

                // leftWall
                const cubeGeometry2 = new THREE.BoxGeometry(2.5, 1, 10);
                const cubeMaterial2 = new THREE.MeshPhongMaterial({ map: walle });
                const leftWall = new THREE.Mesh(cubeGeometry2, cubeMaterial2);
                scene.add(leftWall);

                // Set position of the cube
                leftWall.translateX(-4.5).translateY(1.26).translateZ(0.0);
                leftWall.rotateOnAxis(new THREE.Vector3(0, 0, 1), Math.PI / 2);

                // backwall
                const cubeGeometry1 = new THREE.BoxGeometry(2.5, 1, 8);
                const cubeMaterial1 = new THREE.MeshPhongMaterial({ map: walle });
                const backWall = new THREE.Mesh(cubeGeometry1, cubeMaterial1);
                scene.add(backWall);

                // Set position of the cube
                backWall.translateX(0.0).translateY(1.26).translateZ(-4.5);
                backWall.rotation.x = Math.PI / 2;
                backWall.rotation.y = Math.PI / 2;

                // rightwall
                const cubeGeometry = new THREE.BoxGeometry(2.5, 1, 10);
                const cubeMaterial = new THREE.MeshPhongMaterial({ map: walle });
                const rightWall = new THREE.Mesh(cubeGeometry, cubeMaterial);
                scene.add(rightWall);

                // Set position of the cube
                rightWall.translateX(4.5).translateY(1.26).translateZ(0.0);
                rightWall.rotationOnAxis(new THREE.Vector3(0, 0, 1), Math.PI / 2);

                // Interior Walls
                // Wall 1
                const cubeGeometryW = new THREE.BoxGeometry(2.45, 1, 2);
                const cubeMaterialW = new THREE.MeshPhongMaterial({ map: texture2});
                const Wall1 = new THREE.Mesh(cubeGeometryW, cubeMaterialW);
                scene.add(Wall1);

                // Set position of the cube
                Wall1.translateX(-1.5).translateY(1.26).translateZ(3.9);
                Wall1.rotateOnAxis(new THREE.Vector3(0, 0, 1), Math.PI / 2);

                // Wall3
                const cubeGeometryW3 = new THREE.BoxGeometry(2.45, 1, 2);
                const cubeMaterialW3 = new THREE.MeshPhongMaterial({ map: texture2 });
                const Wall3 = new THREE.Mesh(cubeGeometryW3, cubeMaterialW3 );
                scene.add(Wall3);

                // Set position of the cube
                Wall3.translateX(3.0).translateY(1.26).translateZ(-0.2);
                Wall3.rotation.x = Math.PI / 2;
                Wall3.rotation.y = Math.PI / 2;

                // Wall4
                const cubeGeometryW4 = new THREE.BoxGeometry(2.45, 1, 2);
                const cubeMaterialW4 = new THREE.MeshPhongMaterial( { map: texture2});
                const Wall4 = new THREE.Mesh(cubeGeometryW4, cubeMaterialW4 );
                scene.add(Wall4);

                // Set position of the cube
                Wall4.translateX(-1.5).translateY(1.26).translateZ(-0.6);
                Wall4.rotateOnAxis(new THREE.Vector3(0, 0, 1), Math.PI / 2);

                // frontWall
                const cubeGeometryF = new THREE.BoxGeometry(2.5, 0.01, 8);
                const cubeMaterialF = new THREE.MeshPhongMaterial({ color: 'rgb(255,250,250)', opacity:0.5, transparent: true });
                const frontWall = new THREE.Mesh(cubeGeometryF, cubeMaterialF);
                scene.add(frontWall);

                // Set position of the cube
                frontWall.translateX(0.0).translateY(1.25).translateZ(4.95);
                frontWall.rotation.x = Math.PI / 2;
                frontWall.rotation.y = Math.PI / 2;

                //Load Models
                const loader = new GLTFLoader();
                let obj, obj2, obj4;

                loader.load()

        }

    </script>
</head>

<!-- Gallery -->
<div class="container">

</div>


@endsection