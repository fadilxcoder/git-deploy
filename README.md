
# Automated Deployment (private repo)

### Notes

- https://randomkeygen.com/ (Secure Password & Keygen Generator)
- https://github.com/vicenteguerra/git-deploy (Source)
- https://kamarada.github.io/en/2019/07/14/using-git-with-ssh-keys/ (Using Git with SSH keys)

---

### SSH (server)

- Connect to you server by **SSH**
- Generate a new SSH key pair
- - `ssh-keygen -t rsa -b 4096 -C "your_git_email_address@gmail.com" `
- - Avoid using default, enter full path of new key pair : `/home/your_user_name/.ssh/id_rsa_github`
- - Passphrase is not obligatory
- - `id_rsa_github` & `id_rsa_github.pub` will be created in **.ssh** directory
- Add the private SSH key to the ssh-agent : `eval "$(ssh-agent -s)"`
- - `ssh-add ~/.ssh/id_rsa_github`
- - You may need to enter the passphrase to validate it.

---

### SSH Key to you account

- Copy the content of `id_rsa_github.pub`
- GOTO *github.com* > *My Github settings* > *SSH and GPG keys* **OR** *your_github_repo* > *settings tab* > *Deploy keys*
- Add a title and the content of `id_rsa_github.pub`, tick allow write access

---

### Test SSH

- You must follow this way of explicit configuration if you have **more than 1 key (2 and more)** in your **~/.ssh/** directory. 
- - Create `config` file in **.ssh**
- - `Host github.com`
- - `   IdentityFile ~/.ssh/id_rsa_github`
- Run `ssh -T git@github.com`, Type **yes** if prompted

---

### App Setup 

- Include the `automated-deployment` directory into your application
- Configure the `deploy.php` & remove unused files
- Clone your app repo by **SSH** (This should be done manually the first time and codebase will automatically be deployed next time)
- You may need to run some commands,
- - `sudo chown -R yourusername:webserverusername your_directory_name/`
- - `sudo chmod -R g+s your_directory_name/`
- - `sudo chmod -R 775 your_directory_name/`

---

### Automated Deployment Setup 

- GOTO *your_github_repo* > *settings tab* > *Webhooks* > *Add webhook*
- - Payload URL : `https://<your_domain>/<path_to_file>/deploy.php`
- - Content type : `application/json`
- - Secret : `code found in deploy.php`
- - Events trigger : `Just the push event`
- - Active : :ballot_box_with_check:
- You can check `deploy.log` OR `Github Webhooks` section to view Success / Errors response generated when deploying automatically

---

## WGET

- `wget --header="Content-Type: application/json" --post-data='{"ref":"refs/heads/master"}' 'http://<your_domain>/<path_to_file>/deploy.php?token=<YOUR_TOKEN>' `
- Might face issue regarding TLS, Try to use **http** instead of **https**
