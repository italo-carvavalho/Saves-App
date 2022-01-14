<?php
require_once("templates/header.php");
?>

<?php

$stmt = $conn->query("SELECT name, city , name_services, image
FROM services INNER JOIN users WHERE id_user = fk_id_user");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<h1>Agendar um serviço</h1>


<div class="header-fixed">
    <table>
            <tr>
                <th>S. No</th>
                <th>Image</th>
                <th>Username</th>
                <th>Email</th>
                <th>Departaments</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td><img src="images/perfil.png" alt=""></td>
                <td>Raki Gupta</td>
                <td>raki@gmail.com</td>
                <td>Tecnologi</td>
                <td><button>View</button></td>
            </tr>
    </table>
</div>



<?php
require_once("templates/footer.php");
?>