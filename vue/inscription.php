<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}vue{$ds}struct{$ds}header.php"); ?>

<div class="row">
    <div class="large-12 columns">
        <form>
            <fieldset>
                <legend>Connexion</legend>
                <div class="row">
                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Login</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="text" placeholder="login">
                            </div>
                        </div>
                    </div>
                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Password</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="password" placeholder="password">
                            </div>
                        </div>
                    </div>
                    <div class="large-12 columns">
                        <input class="button radius success right" type="submit" value="Connexion">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>


<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}vue{$ds}struct{$ds}footer.php"); ?>