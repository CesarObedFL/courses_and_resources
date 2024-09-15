<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/controllers/UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/controllers/DeptoController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/controllers/SchedulerController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/gantt_chart/controllers/WSController.php';

$response = array();

if ( $_GET['resource'] == 'update_scheduler' ) {

    $datosJson = file_get_contents('php://input');
    $data = json_decode($datosJson, true);
    $response = SchedulerController::update_scheduler_data($data['new_init'], $data['new_end'], $data['new_day'], $data['id']);
    
    if ($response) {
        $datos = [
            'response' => 'update successful!...',
            'code' => 200,
        ];
    } else {
        $datos = [
            'response' => 'error!...',
            'code' => 400,
        ];
    }
    echo json_encode( $datos );
} else if ( $_GET['resource'] == 'get_users' ) {
    $users = UserController::get_users();
    while ( $user = $users->fetch_object() ){
        array_push($response, $user);
    }
    echo json_encode($response);

} else if ( $_GET['resource'] == 'get_deptos' ) {
    $deptos = DeptoController::get_deptos();
    while ( $depto = $deptos->fetch_object() ){
        array_push($response, $depto);
    }
    echo json_encode($response);

} else if ( $_GET['resource'] == 'get_scheduler_data' ) {
    $scheduler_data = SchedulerController::get_scheduler_data();
    while ( $scheduler = $scheduler_data->fetch_object() ){
        array_push($response, $scheduler);
    }
    echo json_encode($response);

} else if ( $_GET['resource'] == 'get_all_ws' ) {
    $wss = WSController::get_all_ws();
    while ( $ws = $wss->fetch_object() ){
        array_push($response, $ws);
    }
    echo json_encode($response);

} else {
    http_response_code(400);
    $error = array(
        'status' => 'error',
        'message' => 'Los datos proporcionados son inválidos.'
    );
    header('Content-Type: application/json');
    echo json_encode($error);
}