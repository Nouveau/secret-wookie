#!/bin/bash
modules=(cod_support)
themes=()

pull_git() {
    cd $BUILD_PATH/cod_profile
    if [[ -n $RESET ]]; then
      git reset --hard HEAD
    fi
    git pull origin 7.x-1.x

    cd $BUILD_PATH/repos/modules
    for i in "${modules[@]}"; do
      echo $i
      cd $i
      if [[ -n $RESET ]]; then
        git reset --hard HEAD
      fi
      git pull origin 7.x-1.x
      cd ..
    done
}

release_notes() {
  rm -rf rn.txt
  pull_git $BUILD_PATH
  OUTPUT="<h2>Release Notes for $RELEASE</h2>"
  cd $BUILD_PATH/cod_profile
  OUTPUT="$OUTPUT <h3>cod Profile:</h3> `drush rn --date $FROM_DATE $TO_DATE`"

  cd $BUILD_PATH/repos/modules
  for i in "${modules[@]}"; do
    echo $i
    cd $i
    RN=`drush rn --date $FROM_DATE $TO_DATE`
    if [[ -n $RN ]]; then
      OUTPUT="$OUTPUT <h3>$i:</h3> $RN"
    fi
    cd ..
  done

  echo $OUTPUT >> $BUILD_PATH/rn.txt
}

build_distro() {
    if [[ -d $BUILD_PATH ]]; then
        cd $BUILD_PATH
        tar -czvf $BUILD_PATH/sites.tar.gz publish/sites
        sudo rm -rf ./publish
        # do we have the profile?
        if [[ -d $BUILD_PATH/cod_profile ]]; then
          if [[ -d $BUILD_PATH/repos ]]; then
            drush make cod_profile/build-cod.make --no-cache --working-copy --prepare-install ./publish
            rm -rf publish/profiles/cod/modules/contrib/cod*
            rm -rf publish/profiles/cod/themes/contrib/cod*
          else
            mkdir $BUILD_PATH/repos
            mkdir $BUILD_PATH/repos/modules
            cd $BUILD_PATH/repos/modules
            for i in "${modules[@]}"; do
              echo "bringing in ${i} for $USERNAME";
              if [[ -n $USERNAME ]]; then
                git clone --branch 7.x-1.x ${USERNAME}@git.drupal.org:project/${i}.git
              else
                git clone --branch 7.x-1.x http://git.drupal.org/project/${i}.git
              fi
            done
            cd $BUILD_PATH/repos
            mkdir $BUILD_PATH/repos/themes
            cd $BUILD_PATH/repos/themes
            for i in "${themes[@]}"; do
              if [[ -n $USERNAME ]]; then
                git clone --branch 7.x-1.x ${USERNAME}@git.drupal.org:project/${i}.git
              else
                git clone --branch 7.x-1.x http://git.drupal.org/project/${i}.git
              fi
            done
            build_distro $BUILD_PATH
          fi
          ln -sf $BUILD_PATH/repos/modules/cod* publish/profiles/cod/modules/contrib/
          ln -sf $BUILD_PATH/repos/themes/cod* publish/profiles/cod/themes/contrib/
          chmod -R 777 publish/sites/default
          # symlink the profile to our dev copy
          rm -f publish/profiles/cod/*.*
          rm -rf publish/profiles/cod/images
          ln -s $BUILD_PATH/cod_profile/* publish/profiles/cod/
        else
          git clone http://git.drupal.org/project/cod.git cod_profile
          build_distro $BUILD_PATH
        fi
        cd $BUILD_PATH
        tar -zxvf $BUILD_PATH/sites.tar.gz
    else
      mkdir $BUILD_PATH
      build_distro $BUILD_PATH $USERNAME
    fi
}

# This allows you to test the make file without needing to upload it to drupal.org and run the main make file.
test_makefile() {
  if [[ -d $BUILD_PATH ]]; then
    cd $BUILD_PATH
    # do we have the profile?
    if [[ -d $BUILD_PATH/cod_profile ]]; then
      # do we have an installed cod profile?
      if [[ -d $BUILD_PATH/publish ]]; then
        cd $BUILD_PATH
        rm -f publish.tar.gz
        rm -f cod.tar.gz
        drush make --tar --drupal-org=core cod_profile/drupal-org-core.make publish
        drush make --tar --drupal-org cod_profile/drupal-org.make cod
        tar -zxvf publish.tar.gz
        cd publish/profiles
        # remove the symlinks in the repos before we execute
        find . -mindepth 2 -type l | awk -F/ '{print $5}' | sed '/^$/d' > ${BUILD_PATH}/repos.txt
        # exclude repos since we're updating already by linking it to the repos directory.
        UNTAR="tar -zxvf ${BUILD_PATH}/cod.tar.gz -X ${BUILD_PATH}/repos.txt"
        eval $UNTAR
        echo "Successfully Updated drupal from make files"
        exit 0
      fi
    fi
  fi
  echo "Unable to find Build path or drupal root. Please run build first"
  exit 1
}

case $1 in
  pull)
    if [[ -n $2 ]]; then
      BUILD_PATH=$2
      if [[ -n $3 ]]; then
       RESET=1
      fi
    else
      echo "Usage: build_distro.sh pull [build_path]"
      exit 1
    fi
    pull_git $BUILD_PATH $RESET;;
  build)
    if [[ -n $2 ]]; then
      BUILD_PATH=$2
    else
      echo "Usage: build_distro.sh build [build_path]"
      exit 1
    fi
    if [[ -n $3 ]]; then
      USERNAME=$3
    fi
    build_distro $BUILD_PATH $USERNAME;;
  update)
    if [[ -n $2 ]]; then
      BUILD_PATH=$2
      if [[ $3 == 'dev' ]] || [[ $3 == 'nodev' ]]; then
        DEV=$3
      else
        DEV='dev'
      fi
    else
      echo "Usage: build_distro.sh update [build_path] [dev|nodev]"
      exit 1
    fi
    update $BUILD_PATH $DEV;;
  rn)
    if [[ -n $2 ]] && [[ -n $3 ]] && [[ -n $4 ]] && [[ -n $5 ]]; then
      BUILD_PATH=$2
      RELEASE=$3
      FROM_DATE=$4
      TO_DATE=$5
    else
      echo "Usage: build_distro.sh rn [build_path] [release] [from_date] [to_date]"
      exit 1
    fi
    release_notes $BUILD_PATH $RELEASE $FROM_DATE $TO_DATE;;
  test_makefile)
    if [[ -n $2 ]]; then
      BUILD_PATH=$2
    else
      echo "Usage: build_distro.sh test_makefile [build_path]"
      exit 1
    fi
    if [[ -n $3 ]]; then
      USERNAME=$3
    fi
    test_makefile $BUILD_PATH;;
esac