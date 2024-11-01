<?php

    //informações para acessar o projeto marcenaria extrema dentro do
    //Supabase


function baseUri($method = ''){
    return 'https://inftqfcizgvxntcipxvr.supabase.co/auth/v1/' . $method;
}

function getHeader() {
    return [
        'apikey' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImluZnRxZmNpemd2eG50Y2lweHZyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mjg2MDYwNDcsImV4cCI6MjA0NDE4MjA0N30.NHgOyD8rgby8R5n0ebhAe_sdle5wpUzNgwI8oF4ezt4',
        'Content-Type' => 'application/json'
    ];
}