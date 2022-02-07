<?php

function html(string $text = null) {
    return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function view($response, $template, $data = [], $layout = true) {
    if (!$layout) $GLOBALS['container']->view->setLayout(null);
    return $GLOBALS['container']->view->render($response, $template, $data);
}

function path_for($name, array $data = [], array $queryParams = []) {
    return $GLOBALS['container']->router->pathFor($name, $data, $queryParams);
}

function json($response, $data, $status = null, $encodingOptions = 0) {
    if(!$data) return $response->withStatus(404);
    return $response->withJson($data, $status, $encodingOptions);
}

function status_code($response, $code, $reasonPhrase = '') {
    return $response->withStatus($code, $reasonPhrase);
}

function redirect($response, $url, $status = null) {
    return $response->withRedirect($url, $status);
}

function redirect_with_success($response, $url, $message = '') {
    $GLOBALS['container']->flash->addMessage('success', $message);
    return $response->withRedirect($url, null);
}

function redirect_with_info($response, $url, $message = '') {
    $GLOBALS['container']->flash->addMessage('info', $message);
    return $response->withRedirect($url, null);
}

function redirect_with_warning($response, $url, $message = '') {
    $GLOBALS['container']->flash->addMessage('warning', $message);
    return $response->withRedirect($url, null);
}

function redirect_with_error($response, $url, $message = '') {
    $GLOBALS['container']->flash->addMessage('error', $message);
    return $response->withRedirect($url, null);
}

function html_option_selected($val1, $val2) {
    return ($val1 == $val2) ? 'selected' : '';
}

function html_checkbox($val) {
    return ($val == 1) ? 'checked' : '';
}

function css_make_active($page_id) {
	return $GLOBALS['container']->view->getAttribute('pageid') == $page_id ? 'active' : '';
}

function ellipsis($str, $len = 50) {
	return strlen($str) > $len ? substr($str, 0, $len) . '...' : $str;
}