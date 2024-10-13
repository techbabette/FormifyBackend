resource "hcloud_ssh_key" "backend_key" {
    name = "Formify backend key"
    public_key = file("backendkey.pub")
}