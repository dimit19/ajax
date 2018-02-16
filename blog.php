<?php
class Blog extends CI_Model {

        
        

        public function insert_entry($data)
        {
            
        foreach ($data['studentname'] as $val) 
        {
			$insert[] = array(
			"studentname" => $val,
			"standardid" => $data['standard']
			);
        }
        $result = $this->db->insert_batch('student',$insert);
        return $result;
		}
		
		public function insert_subjects($data)
        {
            
        foreach ($data['studentname'] as $val) 
        {
			$insert[] = array(
			"subjectname" => $val,
			"standardid" => $data['standard']
			);
        }
        $result = $this->db->insert_batch('subject',$insert);
        return $result;
		}
		public function get_students($data)
		{
			$this->db->select('*');
			$this->db->from('student');
			$this->db->where('standardid',$data['standard']);
			$query = $this->db->get();
			$result = $query->result_array();
			?>
			<label for="sel1">Select student:</label>
		     <select class="form-control studentlist" id="studentlist">

			<?php 
			
			$value = array();
			foreach($result as $val)
			{?> 
		     <option value="<?php echo $val['studentid']; ?>"><?php echo $val['studentname']; ?></option>		
		   <?php 	  	
		 	}
			?>
			</select>
			<?php 
		
			return true;
		}
		public function get_subjects($data)
		{
			$this->db->select('*');
			$this->db->from('subject');
			$this->db->where('standardid',$data['standard']);
			$query = $this->db->get();
			$result = $query->result_array();
			?>
			

			<?php 
			
			$value = array();
			foreach($result as $val)
			{?> 
		     <p><?php echo $val['subjectname']." = ";?></p> <input type="text" data-id="<?php echo $val['subjectid'];?>" class="form-control subject" id="subname" name="subname[]"><br/>		
		   <?php 	  	
		 	}
			?>
			
			<?php 
		
			return true;
		}
		public function insert_subjects_marks($data)
		{
		 for($i=0; $i< count($data['subjectmarks']); $i++)
		 {
			$insert[] = array(
			"subjectid" => $data['subjectname'][$i],
			"studentid" => $data['studentname'],
			"standardid" => $data['standard'],
			"marks" => $data['subjectmarks'][$i]
			); 			
		 }
		
        $result = $this->db->insert_batch('marks',$insert);
        return $result;
		}
		public function result($data)
		{
			$this->db->select('student.studentname,subject.subjectname,marks.marks');
			$this->db->from('marks');
			$this->db->join('subject', 'subject.subjectid = marks.subjectid');
			$this->db->join('student', 'student.studentid = marks.studentid');
			$this->db->where('marks.standardid',$data['standard']);
			$query = $this->db->get();
			$result = $query->result_array();
?>		
		<table style="width:100%">
  <tr>
    <th>studentname</th>
    <th>subjectname</th> 
    <th>marks</th>
	<th>result</th>
	<th>count</th>
  </tr>
  <?php
$sum = 0;
  foreach($result as $val){
	  
	  $sum += $val['marks'];
	  ?>
  <tr>
    <td><?php echo $val['studentname']; ?></td>
    <td><?php echo $val['subjectname']; ?></td> 
    <td><?php echo $val['marks']; ?></td>
	<td <?php if($val['marks'] < 35) { echo "style='color:red;'"; } else { echo "style='color:green;'";} ?>><?php if($val['marks'] < 35) { echo "fail"; } else { echo "pass";} ?></td>
	<td></td>
  </tr>
 
		<?php } ?>
 <tr><?php  echo $sum; ?> </tr> 
</table>
<?php 
		   return true;
		}

		public function resultmonth()
		{
			$this->db->select('*');
			$this->db->from('month');			
			$query = $this->db->get();
			$result = $query->result_array();
			?>
<table>
<tr>
<th>monthname</th>
<th>value</th> 
</tr>

<?php 
$i = 1;
 foreach($result as $val){ ?>
<tr>
<td><?php echo $val['monthname']; ?></td>
<td><input type="text" name="monthvalue[]" id="monthvalue<?php echo $val['monthid']; ?>" class="monthvalue" onkeypress="myFunction(<?php echo $val['monthid']; ?>)"> <?php  echo '<input type="button" name="monthbtn"  class="monthbtn" value="copy" id="monthbtn'.$val['monthid'].'" style="display:none;" onclick="myFunction1('.$val['monthid'].')" >';  ?></td> 
</tr>
<?php $i++; } ?>
<input type="submit" id="submit" name="submit" value="submit" onclick="submit1();">
</table>	
<?php 
return true;
}

}
?>
