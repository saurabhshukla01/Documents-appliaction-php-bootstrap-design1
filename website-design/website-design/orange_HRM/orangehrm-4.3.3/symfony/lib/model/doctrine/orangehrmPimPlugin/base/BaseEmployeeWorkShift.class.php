<?php

/**
 * BaseEmployeeWorkShift
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property int                $workShiftId                 Type: integer(4), primary key
 * @property int                $emp_number                  Type: integer(4), primary key
 * @property WorkShift          $WorkShift                   
 * @property Employee           $Employee                    
 *  
 * @method int                  getWorkshiftid()             Type: integer(4), primary key
 * @method int                  getEmpNumber()               Type: integer(4), primary key
 * @method WorkShift            getWorkShift()               
 * @method Employee             getEmployee()                
 *  
 * @method EmployeeWorkShift    setWorkshiftid(int $val)     Type: integer(4), primary key
 * @method EmployeeWorkShift    setEmpNumber(int $val)       Type: integer(4), primary key
 * @method EmployeeWorkShift    setWorkShift(WorkShift $val) 
 * @method EmployeeWorkShift    setEmployee(Employee $val)   
 *  
 * @package    orangehrm
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEmployeeWorkShift extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ohrm_employee_work_shift');
        $this->hasColumn('work_shift_id as workShiftId', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('emp_number', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('WorkShift', array(
             'local' => 'work_shift_id',
             'foreign' => 'id'));

        $this->hasOne('Employee', array(
             'local' => 'emp_number',
             'foreign' => 'empNumber'));
    }
}