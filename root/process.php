<?php
include 'config.php';
// handling errors
$errors = array();
foreach ($errors as $error) {
	echo $errors;
}

if(isset($_POST['register_admin'])){
    trim(extract($_POST));

    if (count($errors) == 0) {
        $register_admin = $dbh->query("SELECT email FROM users WHERE email = '$email'")->fetchColumn();
        if(!$register_admin){
            $filename = trim($_FILES['image']['name']);
            $chk = rand(1111111111111, 9999999999999);
            $ext = strrchr($filename, ".");
            $image = $chk . $ext;
            $target_img = "../uploads/" . $image;
            $url = SITE_URL . '/uploads/' . $image;

            $password = addslashes(sha1($password));
            $email = addslashes($email);
            $name = addslashes($name);
            $status = addslashes($status);
            $sql = "INSERT INTO users VALUES (NULL,'$name','$email','$password','Admin','$status','','','','','','$url','' )";
            $result = dbCreate($sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_img)) {
                echo "<script>
                    alert('Registration is Successfull');
                    window.location = '" . HOME_URL. "user' ;
                    </script>"; 
            } else {
                echo "<script>
                    alert('Image Failed to Upload');
                    window.location = '" . HOME_URL. "user' ;
                    </script>";
            }
			if ($result == 1) {
				echo "<script>
            alert('Registration is Successfull');
            window.location = '" . HOME_URL . "user';
            </script>";
			} else {
				echo "<script>
              alert('User registration Failed');
              window.location = '" . HOME_URL . "user';
              </script>";
			}
        }
        else {
			echo "<script>
            alert('Username already registered');
            window.location = '" . HOME_URL . "user';
            </script>";
		}
     }
}
elseif (isset($_REQUEST['delete-user'])) {
	dbDelete('users', 'user_id', $_REQUEST['delete-user']);
	redirect_page('user');
} elseif (isset($_POST['edit_user'])) {
    //deleting users
	trim(extract($_POST));
    $user_id = isset($user_id) ? $user_id : "";
    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $filename = trim($_FILES['image']['name']);
    	$chk = rand(1111111111111, 9999999999999);
    	$ext = strrchr($filename, ".");
    	$image = $chk . $ext;
    	$target_img = "../uploads/" . $image;
    	$url = SITE_URL . '/uploads/' . $image;
    }
    else{
        $url = "$default_image";
    }
    	$sql = $dbh->query("UPDATE users SET name = '$name', email = '$email', status= '$status', 
    	image= '$url' WHERE user_id = '$user_id' ");
         if (!empty($_FILES['image']['name'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_img)) {
    		echo "<script>
                alert('User Updated Successfully');
                window.location = '" . HOME_URL. "user' ;
                </script>"; 
    	} else {
    		echo "<script>
                alert('Image Failed to Upload');
                window.location = '" . HOME_URL. "user' ;
                </script>";
    	}
    }
	if ($sql) {
        echo "<script>
    alert('User Updated Successfully');
    window.location = '" . HOME_URL . "user';
    </script>";
    } else {
        echo "<script>
      alert('User Failed to Update');
      window.location = '" . HOME_URL . "user';
      </script>";
    }
}

elseif(isset($_POST['register_bocker'])){
    trim(extract($_POST));

    if (count($errors) == 0) {
        $regist_brocker = $dbh->query("SELECT email FROM users WHERE email = '$email'")->fetchColumn();
        if(!$regist_brocker){
            $password = sha1($password);
            $sql = "INSERT INTO users VALUES (NULL,'$name','$email','$password','$usergroup','Inactive','Pending','','','','','','' )";
            $result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
            alert('Registration is Successfull');
            window.location = '" . SITE_URL  . "login';
            </script>";
			} else {
				echo "<script>
              alert('User registration Failed');
              window.location = '" . SITE_URL  . "register';
              </script>";
			}
        }
        else {
			echo "<script>
            alert('Username already registered');
            window.location = '" . SITE_URL  . "register';
            </script>";
		}
     }
}elseif (isset($_REQUEST['delete-brocker'])) {
	dbDelete('users', 'user_id', $_REQUEST['delete-brocker']);
	redirect_page('brocker');

}elseif (isset($_POST['login_btn'])) {
	//`userid`, `name`, `email`
	trim(extract($_POST));
	$password = sha1($password);
	$result = $dbh->query("SELECT * FROM users WHERE email = '$email' AND password='$password' ");
	if ($result->rowCount() == 1) {
		$row = $result->fetch(PDO::FETCH_OBJ);
		$_SESSION['user_id'] = $row->user_id;
		$_SESSION['status'] = $row->status;
		$_SESSION['usergroup'] = $row->usergroup;
		$_SESSION['name'] = $row->name;
		$_SESSION['email'] = $row->email;
        $_SESSION['status'] = '<div class="alert alert-success text-center">Logged in successfuly</div>';
        $_SESSION['loader'] = '<div id="spinner-container" class="text-center">
                                  <div class="spinner-border" role="status">
                                    <span class="sr-only"></span>
                                  </div>
                                  <p>Loading...</p>
                                </div>';
        header("refresh:3; url=".HOME_URL);
	} else {
        $_SESSION['status'] = '<div class="alert alert-danger text-center">Wrong username or password</div>';
	}
} 
// verify_btn
elseif (isset($_POST['verify_btn'])) {
	trim(extract($_POST));

	$filename = trim($_FILES['image']['name']);
	$chk = rand(1111111111111, 9999999999999);
	$ext = strrchr($filename, ".");
	$image = $chk . $ext;
	$target_img = "../uploads/" . $image;
	$url = SITE_URL . '/uploads/' . $image;
    // national_id_photo

    $filename1 = trim($_FILES['national_id_photo']['name']);
	$chk1 = rand(1111111111111, 9999999999999);
	$ext1 = strrchr($filename1, ".");
	$national_id_photo = $chk1 . $ext1;
	$target_img1 = "../uploads/" . $national_id_photo;
	$national_url = SITE_URL . '/uploads/' . $national_id_photo;

    $user_id = addslashes($user_id);
	$national_Id = addslashes($national_Id);
	$contact = addslashes($contact);
	$whatsApp = addslashes($whatsApp);
	$location = addslashes($location);

	$sql = $dbh->query("UPDATE users SET status='Active', national_id = '$national_Id',contact = '$contact'
    ,whatsApp = '$whatsApp',location = '$location',image = '$url',national_id_photo='$national_url' 
    WHERE user_id = '$user_id'");
	if ((move_uploaded_file($_FILES['image']['tmp_name'], $target_img)) &&
     (move_uploaded_file($_FILES['national_id_photo']['tmp_name'], $target_img1) )) {
		echo "<script>
            alert('Account activated successfuly');
            window.location = '" . HOME_URL. "' ;
            </script>"; 
	} else {
		echo "<script>
            alert('Image Failed to Upload');
            window.location = '" . HOME_URL. "verification' ;
            </script>";
	}
	if ($result == 1) {
		echo "<script>
            alert('Account activated successfuly');
            window.location = '" . HOME_URL. "' ;
            </script>";
	} else {
		echo "<script>
            alert('Account Activation failed');
            window.location = '" . HOME_URL. "verification' ;
            </script>";
	}
}
// update_profile


elseif (isset($_POST['update_profile'])) {
	trim(extract($_POST));

	$filename = trim($_FILES['image']['name']);
	$chk = rand(1111111111111, 9999999999999);
	$ext = strrchr($filename, ".");
	$image = $chk . $ext;
	$target_img = "../uploads/" . $image;
	$url = SITE_URL . '/uploads/' . $image;
    // national_id_photo

    $filename1 = trim($_FILES['national_id_photo']['name']);
	$chk1 = rand(1111111111111, 9999999999999);
	$ext1 = strrchr($filename1, ".");
	$national_id_photo = $chk1 . $ext1;
	$target_img1 = "../uploads/" . $national_id_photo;
	$national_url = SITE_URL . '/uploads/' . $national_id_photo;

    $user_id = addslashes($user_id);
	$national_Id = addslashes($national_Id);
	$contact = addslashes($contact);
	$whatsApp = addslashes($whatsApp);
	$location = addslashes($location);

	$sql = $dbh->query("UPDATE users SET status='Active', national_id = '$national_Id',contact = '$contact'
    ,whatsApp = '$whatsApp',location = '$location',image = '$url',national_id_photo='$national_url' 
    WHERE user_id = '$user_id'");
	if ((move_uploaded_file($_FILES['image']['tmp_name'], $target_img)) &&
     (move_uploaded_file($_FILES['national_id_photo']['tmp_name'], $target_img1) )) {
		echo "<script>
            alert('Account Updated successfuly');
            window.location = '" . HOME_URL. "' ;
            </script>"; 
	} else {
		echo "<script>
            alert('Image Failed to Upload');
            window.location = '" . HOME_URL. "' ;
            </script>";
	}
	if ($result == 1) {
		echo "<script>
            alert('Account updated successfuly');
            window.location = '" . HOME_URL. "' ;
            </script>";
	} else {
		echo "<script>
            alert('Account failed to Update');
            window.location = '" . HOME_URL. "' ;
            </script>";
	}
}
// update_profile


// property_type_add
elseif(isset($_POST['property_type_add'])){
    trim(extract($_POST));

    if (count($errors) == 0) {
        $add_property = $dbh->query("SELECT property_type_name FROM property_type WHERE property_type_name = '$property_type_name'")->fetchColumn();
        if(!$add_property){
            
            $sql = "INSERT INTO property_type VALUES (NULL,'$property_type_name','$status')";
            $result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
            alert('Property Type is added Successfull');
            window.location = '" . HOME_URL  . "propertyType';
            </script>";
			} else {
				echo "<script>
              alert('Failed to add Property Type');
              window.location = '" . HOME_URL  . "propertyType';
              </script>";
			}
        }
        else {
			echo "<script>
            alert('Property type already exits');
            window.location = '" . HOME_URL  . "propertyType';
            </script>";
		}
     }
}
// edit_type
elseif (isset($_POST['edit_type'])) {
	trim(extract($_POST));

    $property_type_id = isset($property_type_id) ? $property_type_id : "";

	$sql = $dbh->query("UPDATE property_type SET property_type_name = '$property_type_name', 
    status = '$status' WHERE property_type_id = '$property_type_id' ");

		if ($sql) {
            echo "<script>
        alert('Property Type Updated Successfully');
        window.location = '" . HOME_URL . "propertyType';
        </script>";
        } else {
            echo "<script>
          alert('Property type Failed to Update');
          window.location = '" . HOME_URL . "propertyType';
          </script>";
        }
}

elseif (isset($_REQUEST['delete-type'])) {
	dbDelete('property_type', 'property_type_id', $_REQUEST['delete-type']);
	redirect_page('?propertyType');
} 
// add_category
elseif(isset($_POST['add_category'])){
    trim(extract($_POST));
    if (count($errors) == 0) {
        $add_category = $dbh->query("SELECT category_name FROM property_category WHERE category_name = '$category_name'")->fetchColumn();
        if(!$add_category){
            $slug = preg_replace("/[^a-z0-9- ]/", "", strtolower($category_name));
            $slug = preg_replace("/[^a-z0-9-]/", "-" , $slug);   
            $sql = "INSERT INTO property_category VALUES (NULL,'$category_name','$slug','$status')";
            $result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
            alert('Property Category is added Successfull');
            window.location = '" . HOME_URL  . "categories';
            </script>";
			} else {
				echo "<script>
              alert('Failed to add Property Category');
              window.location = '" . HOME_URL  . "categories';
              </script>";
			}
        }
        else {
			echo "<script>
            alert('Property Category already exits');
            window.location = '" . HOME_URL  . "categories';
            </script>";
		}
     }
}
// edit_category

elseif (isset($_POST['edit_category'])) {
	trim(extract($_POST));

    $category_id = isset($category_id) ? $category_id : "";

	$sql = $dbh->query("UPDATE property_category SET category_name = '$category_name', 
    status = '$status' WHERE category_id = '$category_id' ");

		if ($sql) {
            echo "<script>
        alert('Property Type Updated Successfully');
        window.location = '" . HOME_URL . "categories';
        </script>";
        } else {
            echo "<script>
          alert('Property type Failed to Update');
          window.location = '" . HOME_URL . "categories';
          </script>";
        }
}

elseif (isset($_REQUEST['delete-cat'])) {
	dbDelete('property_category', 'category_id', $_REQUEST['delete-cat']);
	redirect_page('?category');
}
// add_property
elseif (isset($_POST['add_property_btn'])) {
	trim(extract($_POST));
	//`property_id`, `property_name`, `category_id`, `property_type_id`, `user_id`, `city`, `currency`, `status`, `location`, `price`, `land_measurements`, `bed_rooms`, `bathrooms`, `property_image`, `property_description`, `propert_slug`
	$filename = trim($_FILES['property_image']['name']);
	$chk = rand(1111111111111, 9999999999999);
	$ext = strrchr($filename, ".");
	$property_image = $chk . $ext;
	$target_img = "../uploads/" . $property_image;
	$url = SITE_URL . '/uploads/' . $property_image;

    $property_name = addslashes($property_name);
	$category_id = addslashes($category_id);
	$property_type_id = addslashes($property_type_id);
    $user_id = addslashes($user_id);
	$city = addslashes($city);
	$currency = addslashes($currency);
	$status = addslashes($status);
	$location = addslashes($location);
	$price = addslashes($price);
	$land_measurements = addslashes($land_measurements);
	$bed_rooms = addslashes($bed_rooms);
	$bathrooms = addslashes($bathrooms);
	$property_description = addslashes($property_description);

    //working with slugs...
    $property_slug = preg_replace("/[^a-z0-9- ]/", "", strtolower($property_name));
    $property_slug = preg_replace("/[^a-z0-9-]/", "-" , $property_slug); 

    $check = $dbh->query("SELECT property_slug FROM properties WHERE (property_slug='$property_slug' ) ")->fetchColumn();
     if ($check) {
        $new_property = rand(11111,55555).'-'.$property_slug;
         $result = dbCreate( "INSERT INTO properties VALUES (NULL,'$property_name','$category_id','$property_type_id','$user_id','$city','$currency','$status','$location','$price','$land_measurements','$bed_rooms','$bathrooms','$url','$property_description','$new_property')");
         if (move_uploaded_file($_FILES['property_image']['tmp_name'], $target_img)) {
            //image uploaded successfully...
         }
        if ($result) {
            // echo "<script>
            // alert('Property added successfully');
            // window.location = '" . HOME_URL. "property' ;
            // </script>"; 
        }else{
           echo "<script>
            alert('Image Failed to Upload');
            window.location = '" . HOME_URL. "property' ;
            </script>";
        }
    }else{
        $result = dbCreate( "INSERT INTO properties VALUES (NULL,'$property_name','$category_id','$property_type_id','$user_id','$city','$currency','$status','$location','$price','$land_measurements','$bed_rooms','$bathrooms','$url','$property_description','$property_slug')");
            if (move_uploaded_file($_FILES['property_image']['tmp_name'], $target_img)) {
                //image uploaded successfully...
             }
        if ($result) {
            // echo "<script>
            // alert('Property added successfully');
            // window.location = '" . HOME_URL. "property' ;
            // </script>"; 
        }else{
           echo "<script>
            alert('Image Failed to Upload');
            window.location = '" . HOME_URL. "property' ;
            </script>";
        }
    }





}
// edit_property
elseif (isset($_POST['edit_property'])) {
    trim(extract($_POST));

    $property_id = isset($property_id) ? $property_id : "";

    // Check if property_image is set, if not, set it to a default value
    if (isset($_FILES['property_image']['name']) && !empty($_FILES['property_image']['name'])) {
        $filename = trim($_FILES['property_image']['name']);
        $chk = rand(1111111111111, 9999999999999);
        $ext = strrchr($filename, ".");
        $property_image = $chk . $ext;
        $target_img = "../uploads/" . $property_image;
        $url = SITE_URL . '/uploads/' . $property_image;
    } else {
        // Set default URL if property_image is empty
        $url = "$default_property_image"; // Set your default image URL here
    }
    // Update the properties in the database
    $sql = $dbh->query("UPDATE properties 
                        SET 
                            property_name = '$property_name', 
                            category_id = '$category_id', 
                            property_type_id = '$property_type_id',
                            city='$city',
                            currency='$currency',
                            status='$status',
                            location='$location',
                            price='$price',
                            land_measurements='$land_measurements',
                            bed_rooms='$bed_rooms',
                            bathrooms='$bathrooms',
                            property_description= '$property_description',
                            property_image= '$url' 
                        WHERE 
                            property_id = '$property_id'");

    // Check if the image was uploaded successfully
    if (!empty($_FILES['property_image']['name'])) {
        if (move_uploaded_file($_FILES['property_image']['tmp_name'], $target_img)) {
            echo "<script>
                    alert('Property Updated Successfully');
                    window.location = '" . HOME_URL. "property' ;
                    </script>"; 
        } else {
            echo "<script>
                    alert('Image Failed to Upload');
                    window.location = '" . HOME_URL. "property' ;
                    </script>";
        }
    }

    // Check if the SQL query was successful
    if ($sql) {
        echo "<script>
                alert('Property Updated Successfully');
                window.location = '" . HOME_URL . "property';
                </script>";
    } else {
        echo "<script>
                alert('Property Failed to Update');
                window.location = '" . HOME_URL . "property';
                </script>";
    }
}

elseif (isset($_REQUEST['delete-pro'])) {
	dbDelete('properties', 'property_id', $_REQUEST['delete-pro']);
	redirect_page('?property');
}
// add_packages
elseif(isset($_POST['add_packages'])){
    trim(extract($_POST));
    // package_name	package_duration	package_amount	Status	package_utilities
    if (count($errors) == 0) {
        $add_package = $dbh->query("SELECT package_name FROM packages WHERE package_name = '$package_name'")->fetchColumn();
        if(!$add_package){
            
            $sql = "INSERT INTO packages VALUES (NULL,'$package_name','$package_duration','$currency','$package_amount','$status','$package_utilities')";
            $result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
            alert('Packages is added Successfull');
            window.location = '" . HOME_URL  . "subscription';
            </script>";
			} else {
				echo "<script>
              alert('Failed to add Package');
              window.location = '" . HOME_URL  . "subscription';
              </script>";
			}
        }
        else {
			echo "<script>
            alert('Package Name already exits');
            window.location = '" . HOME_URL  . "subscription';
            </script>";
		}
     }
}
// edit_packages
elseif (isset($_POST['edit_packages'])) {
	trim(extract($_POST));

    $package_id = isset($package_id) ? $package_id : "";

	$sql = $dbh->query("UPDATE packages SET package_name = '$package_name', package_duration = '$package_duration',
    currency = '$currency',package_amount = '$package_amount',
    status = '$status',package_utilities = '$package_utilities' WHERE package_id = '$package_id' ");

		if ($sql) {
            echo "<script>
        alert('Package Updated Successfully');
        window.location = '" . HOME_URL . "subscription';
        </script>";
        } else {
            echo "<script>
          alert('Package Failed to Update');
          window.location = '" . HOME_URL . "subscription';
          </script>";
        }
}
elseif (isset($_REQUEST['delete-sub'])) {
	dbDelete('packages', 'package_id', $_REQUEST['delete-sub']);
	redirect_page('?subscription');
}
elseif (isset($_REQUEST['ban-brocker'])) {
    $id = $_GET['ban-brocker'];
	$sql = $dbh->query("UPDATE users SET verification = 'Banned' WHERE user_id = '$id'");
	if ($sql) {
        echo "<script>
    alert('Customer Banned Successfully');
    window.location = '" . HOME_URL . "brocker';
    </script>";
    } else {
        echo "<script>
      alert('Customer Failed to be Banned');
      window.location = '" . HOME_URL . "brocker';
      </script>";
    }
}
elseif (isset($_REQUEST['Unban-brocker'])) {
    $id = $_GET['Unban-brocker'];
	$sql = $dbh->query("UPDATE users SET verification = 'Verified' WHERE user_id = '$id'");
	if ($sql) {
        echo "<script>
    alert('Customer UnBanned Successfully');
    window.location = '" . HOME_URL . "banned';
    </script>";
    } else {
        echo "<script>
      alert('Customer Failed to be UnBanned');
      window.location = '" . HOME_URL . "banned';
      </script>";
    }
}
// change_password
elseif (isset($_POST['change_password'])) {
	trim(extract($_POST));
    $opass = sha1($old_pass);
    $check_old_pass = $dbh->query("SELECT * FROM users WHERE password = '$opass' AND user_id = '$user_id' ");
    if($check_old_pass->rowCount() == 1){
        //update new password here. 
        $n_pass = sha1($new_pass);
        $password_update = $dbh->query("UPDATE users SET password = '$n_pass' WHERE user_id = '$user_id' ");
        if ($password_update) {
            echo "<script>
        alert('password Updated Successfully');
        window.location = '" . SITE_URL . "logout';
        </script>";
        } else {
            echo "<script>
          alert('password Failed to Update');
          window.location = '" . HOME_URL . "';
          </script>";
        }
    }
}
?>