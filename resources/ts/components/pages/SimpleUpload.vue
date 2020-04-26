<template>
  <v-content>
    <v-container fluid class="d-flex">
      <v-col cols="12" md="12">
      <v-form ref="form" method="POST" action="/team/simpleupload" id="team-simple-upload" lazy-validation justify="center" enctype="multipart/form-data">
		    <input type="hidden" name="_token" :value="csrf" />
          <v-row align="center" justify="center">
            <v-card class="mx-auto">
              <v-card-title class="blue">
                <v-list-item>
                  <v-list-item-action>
                    <v-icon>mdi-upload</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="headline white--text">簡易アップロード(チームデータ)</v-list-item-title>
                    <v-list-item-subtitle class="white--text">ユーザー登録処理をせずにチームデータアップロードが可能です。</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card-title>
              <v-col cols="12" md="12">
                <v-text-field
                  prepend-icon="mdi-account-circle"
                  v-model="ownerName"
                  :counter="10"
                  :rules="requiredRule"
                  label="オーナー名"
                  required
                ></v-text-field>

                <v-textarea
                  prepend-icon="mdi-comment-multiple-outline"
                  v-model="comment"
                  :rules="requiredRule"
                  label="コメント"
                  required
                ></v-textarea>
                <v-combobox
                  v-model="searchTag"
                  :items="items"
                  label="検索タグ"
                  multiple
                  chips
                  prepend-icon="mdi-tag-plus"
                >
                  <template v-slot:selection="data">
                    <v-chip
                      :key="JSON.stringify(data.item)"
                      v-bind="data.attrs"
                      :input-value="data.selected"
                      :disabled="data.disabled"
                      @click:close="data.parent.selectItem(data.item)"
                    >
                      <v-avatar
                        class="accent white--text"
                        left
                        v-text="data.item.slice(0, 1).toUpperCase()"
                      ></v-avatar>
                      {{ data.item }}
                    </v-chip>
                  </template>
                </v-combobox>
                <v-text-field
                  prepend-icon="mdi-lock"
                  v-model="deletePassword"
                  :counter="10"
                  :rules="requiredRule"
                  type="password"
                  label="削除パスワード"
                  required
                ></v-text-field>
                <v-file-input append-icon show-size counter multiple label="チームデータ"></v-file-input>
              </v-col>
              <v-card-actions class="justify-center">
                <v-btn large block class="primary" @click="teamSimpleUpload">チームデータアップロード</v-btn>
              </v-card-actions>
            </v-card>
          </v-row>
        </v-form>
      </v-col>
    </v-container>

    <v-container>
      <v-col cols="12" md="12">
        <v-form ref="form" lazy-validation justify="center">
          <v-row align="center" justify="center">
            <v-card class="mx-auto">
              <v-card-title class="blue-grey">
                <v-list-item>
                  <v-list-item-action>
                    <v-icon>mdi-upload</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="headline white--text">簡易アップロード(マッチデータ)</v-list-item-title>
                    <v-list-item-subtitle class="white--text">ユーザー登録処理をせずにマッチデータのアップロードが可能です。</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card-title>
              <v-col cols="12" md="12">
                <v-text-field
                  prepend-icon="mdi-account-circle"
                  v-model="ownerName"
                  :counter="10"
                  :rules="requiredRule"
                  label="オーナー名"
                  required
                ></v-text-field>

                <v-textarea
                  prepend-icon="mdi-comment-multiple-outline"
                  v-model="comment"
                  :rules="requiredRule"
                  label="コメント"
                  required
                ></v-textarea>
                <v-combobox
                  v-model="searchTag"
                  :items="items"
                  label="検索タグ"
                  multiple
                  chips
                  prepend-icon="mdi-tag-plus"
                >
                  <template v-slot:selection="data">
                    <v-chip
                      :key="JSON.stringify(data.item)"
                      v-bind="data.attrs"
                      :input-value="data.selected"
                      :disabled="data.disabled"
                      @click:close="data.parent.selectItem(data.item)"
                    >
                      <v-avatar
                        class="accent white--text"
                        left
                        v-text="data.item.slice(0, 1).toUpperCase()"
                      ></v-avatar>
                      {{ data.item }}
                    </v-chip>
                  </template>
                </v-combobox>
                <v-text-field
                  prepend-icon="mdi-lock"
                  v-model="deletePassword"
                  :counter="10"
                  :rules="requiredRule"
                  type="password"
                  label="削除パスワード"
                  required
                ></v-text-field>
                <v-file-input append-icon show-size counter multiple label="チームデータ"></v-file-input>
              </v-col>
              <v-card-actions class="justify-center">
                <v-btn large block color="blue-grey" class="white--text">マッチデータアップロード</v-btn>
              </v-card-actions>
            </v-card>
          </v-row>
        </v-form>
      </v-col>
    </v-container>
  </v-content>
</template>

<script lang="ts">
import { Vue, Component } from "vue-property-decorator";

@Component
export default class SimpleUpload extends Vue {
  items: Array<string> = ["大会ゲスト許可", "フリーOKE"];
  requiredRule: Array<object> = [
    (value: any) => !!value || "こちらの項目は必須入力です"
  ];
  ownerName: string = "";
  comment: string = "";
  searchTag: Array<string> = [];
  deletePassword: string = "";
  csrf: string | null = document
    .querySelector('meta[name="csrf-token"]')!
    .getAttribute("content");

  public teamSimpleUpload() {
    (<HTMLFormElement>document.querySelector("#team-simple-upload")).submit();
  }
}
</script>
