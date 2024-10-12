resource "hcloud_server" "backend1" {
  name        = "backend1"
  server_type = "cx22"
  image       = "ubuntu-22.04"
  location    = "nbg1"

  user_data = "${data.template_file.backend.rendered}"
}