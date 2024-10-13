variable "hcloud_token" {
    sensitive = true
}

variable "REDIS_PASSWORD" {
    sensitive = true
    default = "default_redis"
}

variable "MYSQL_PASSWORD" {
    sensitive = true
    default = "default_mysql"
}

variable "APPLICATION_ADMIN_EMAIL" {
    sensitive = true
    default = "mail@fakemail.com"
}

variable "APPLICATION_ADMIN_PASSWORD" {
    sensitive = true
    default = "default_application"
}

variable "MAIL_HOST" {
    sensitive = false
}

variable "MAIL_ADDRESS" {
    sensitive = true
}

variable "MAIL_PASSWORD" {
    sensitive = true
}

variable "MAIL_PORT" {
    sensitive = false
}

variable "FRONTEND_ACTIVATION_URL" {
    sensitive = false
    default = "https://formify.techbabette.com/activate"
}
