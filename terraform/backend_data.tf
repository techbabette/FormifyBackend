data "template_file" "backend" {
    template = "${file("backend_init.sh")}"

    vars = {
        REDIS_PASSWORD = "${var.REDIS_PASSWORD}"
        MYSQL_PASSWORD = "${var.MYSQL_PASSWORD}"

        APPLICATION_ADMIN_EMAIL = "${var.APPLICATION_ADMIN_EMAIL}"
        APPLICATION_ADMIN_PASSWORD = "${var.APPLICATION_ADMIN_PASSWORD}"

        MAIL_HOST = "${var.MAIL_HOST}"
        MAIL_ADDRESS = "${var.MAIL_ADDRESS}"
        MAIL_PASSWORD = "${var.MAIL_PASSWORD}"
        MAIL_PORT = "${var.MAIL_PORT}"

        FRONTEND_ACTIVATION_URL = "${var.FRONTEND_ACTIVATION_URL}"
    }
}