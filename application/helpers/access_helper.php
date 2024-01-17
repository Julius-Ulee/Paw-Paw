<?php

function must_admin_staff()
{
	$isAdminStaff = get_instance();
	if ($isAdminStaff->session->userdata("logged_in") !== "admin") {
		redirect("access-denied");
	}
}

function must_admin()
{
	$isAdmin = get_instance();
	if ($isAdmin->session->userdata("logged_in") !== "admin" && $isAdmin->session->userdata("role") !== "Admin") {
		redirect("access-denied");
	}
}
