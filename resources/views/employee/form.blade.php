{{csrf_field()}}
<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Position:</label>
    <div class="col-md-6">
        <select name="position" id="position">
            <option value="dev" @if(isset($employee) && $employee->position == "dev") selected @endif >Devloper</option>
            <option value="brse" @if(isset($employee) && $employee->position == "brse") selected @endif>BrSE</option>
            <option value="teamlead" @if(isset($employee) && $employee->position == "teamlead") selected @endif>Team Lead</option>
            <option value="qa" @if(isset($employee) && $employee->position == "qa") selected @endif>QA</option>
            <option value="designer" @if(isset($employee) && $employee->position == "designer") selected @endif>Designer</option>
            <option value="comtor" @if(isset($employee) && $employee->position == "comtor") selected @endif>Comtor</option>
        </select>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Age:</label>
    <div class="col-md-6">
        <input type="number" name="age">
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Level:</label>
    <select name="level">
        <option value="fresher" @if(isset($employee) && $employee->level == "fresher") selected @endif >Fresher</option>
        <option value="junior" @if(isset($employee) && $employee->level == "junior") selected @endif>Junior</option>
        <option value="senior" @if(isset($employee) && $employee->level == "senior") selected @endif>Senior</option>
    </select>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Experience:</label>
    <div class="col-md-6">
        <input type="number" name="exp_num" class="col-md-5">
        <select name="exp_unit">
            <option value="month">Month</option>
            <option value="year">Year</option>
        </select>
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Skill:</label>
    <div class="col-md-6">
        <input type="text" name="skill">
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Free until:</label>
    <div class="col-md-6">
        <input type="date" name="free_end"><br>
    </div>
    <label class="col-md-4 control-label">Fully Free:</label>
    <div class="col-md-6">
        <input type="checkbox" name="fully_free">
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Detail:</label>
    <div class="col-md-6">
        <input type="text" name="detail">
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Certificate:</label>
    <div class="col-md-6">
        <input type="text" name="certificate">
    </div>
</div>

<div class="form-group col-xs-6 col-md-6">
    <label class="col-md-4 control-label">Price:</label>
    <div class="col-md-6">
        <input type="number" name="price_num" class="col-md-5">
        <select name="price_unit">
            <option value="hour">Per Hour</option>
            <option value="day">Per Day</option>
            <option value="month">Per Month</option>
        </select>
    </div>
</div>

<div class="form-group col-xs-12 col-md-12">
    <input type="submit" value="Save">
</div>