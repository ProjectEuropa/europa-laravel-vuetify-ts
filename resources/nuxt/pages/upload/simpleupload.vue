<template>
  <v-content>
    <v-container fluid class="d-flex">
      <v-col cols="12" md="12">
        <v-form ref="form" v-model="valid" lazy-validation justify="center">
          <v-row align="center" justify="center">
            <v-card class="mx-auto">
              <v-list-item>
                <v-list-item-action>
                  <v-icon>mdi-upload</v-icon>
                </v-list-item-action>
                <v-list-item-content>
                  <v-list-item-title class="headline">チームデータアップロード</v-list-item-title>
                  <v-list-item-subtitle>ユーザー登録処理をせずにチームデータのアップロードが可能です。</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
              <v-col cols="12" md="12">
                <v-text-field
                  v-model="name"
                  :counter="10"
                  :rules="nameRules"
                  label="オーナー名"
                  required
                ></v-text-field>

                <v-textarea v-model="email" :rules="emailRules" label="コメント" required></v-textarea>
                <v-combobox
                  v-model="select"
                  :items="items"
                  label="検索タグを設定して下さい"
                  multiple
                  chips
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

                <v-file-input append-icon show-size counter multiple label="チームデータ"></v-file-input>
              </v-col>
              <v-card-actions >
                <v-btn class="primary d-flex justify-md-space-center">チームデータアップロード</v-btn>
              </v-card-actions>
            </v-card>
          </v-row>
        </v-form>
      </v-col>
    </v-container>
  </v-content>
</template>
