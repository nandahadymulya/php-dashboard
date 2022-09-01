<?php

function format_date($date)
{
  date_default_timezone_set("Asia/Bangkok");
  $timenow = date("j-F-Y-h:i:s A");
  return date("F j, Y", strtotime($date));
}

$conn = mysqli_connect("localhost", "root", "root", "php_marketing") or die(mysqli_connect_error($conn));

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $row = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function maxPrimary($primary, $tablename, $huruf)
{
  global $conn;
  $query = "SELECT max($primary) as maxPrimary FROM $tablename";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_array($result);
  $maxKode = $data['maxPrimary'];
  $urutan = (int) substr($maxKode, 3, 3);
  $urutan++;
  $kode = $huruf . sprintf("%03s", $urutan);
  return $kode;
}
function create($data, $tablename, $view)
{
  global $conn;
  $field = implode(',', array_keys($data));
  $values = "'" . implode("','", array_values($data)) . "'";
  $query = "INSERT INTO $tablename ($field) VALUES ($values)";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    echo "
      <script>
        alert('Created!');
        document.location='?view=$view';
      </script>
    ";
  }
}

function update($param, $data, $tablename, $primary, $view)
{
  global $conn;
  foreach ($data as $key => $values) {
    $field[] = $key . "='" . $values . "'";
  }
  $field = implode(',', $field);
  $query = "UPDATE $tablename SET $field WHERE $primary = '$param'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    echo "
      <script>
        alert('Updated $param!');
        document.location='?view=$view';
      </script>
    ";
  }
}

function delete($param, $tablename, $primary, $page)
{
  global $conn;
  $param = $param;
  $query = "DELETE FROM $tablename WHERE $primary = '$param'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    echo "
      <script>
        alert('Deleted $param!');
        document.location='?page=$page';
      </script>
    ";
  }
}
