

<div class="container">
    <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
    <div class="bootstrap-iso">
        <div class="container-fluid">
            <div class="row bgs">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form action="{{ URL::to("/login") }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label class="control-label requiredField" for="email">
                                Email
                                <span class="asteriskField">*</span>
                            </label>
                            <input class="form-control" id="email" required name="email" type="text"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label requiredField" for="text">
                                Password
                                <span class="asteriskField">*</span>
                            </label>
                            <input class="form-control" id="text" name="text" required type="password"/>
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include("includes/footer")